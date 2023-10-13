<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\staffs;
use App\Models\department;

use App\Http\Services\departmentService;

class departmentController extends Controller
{
    protected $department_service;

    public function __construct(departmentService $department_service) {
        $this->department_service = $department_service;
    }

    public function index() {
        return view('department.list', [
            'title' => 'Danh sách phòng ban',
            'departments' => department::orderBy('department_id', 'asc')->get()
        ]);
    }

    public function add() {
        return view('department.add', [
            'title' => 'Phòng ban-Thêm',
            'staffs' => staffs::orderBy('id', 'asc')->get(),
        ]);
    }

    public function post_add(Request $request) {
        $result = $this->department_service->create($request);

        if($result) {
            return redirect()->route('departmentList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($department_id) {
        $department = department::where('department_id', $department_id)->first();
        $staffs = staffs::whereNotIn('id', [$department->manager_id])->get();

        return view('department.edit', [
            'title' => 'Phòng ban-Chỉnh sửa',
            'department' => $department,
            'staffs' => $staffs
        ]);
    }

    public function post_edit(Request $request, $department_id) {
        $department = department::where('department_id', $department_id)->first();
        $result = $this->department_service->update($request, $department);
        
        if($result) {
            return redirect()->route('departmentList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function search(Request $request) {
        $result = $this->department_service->search($request);

        return view('department.list',[
            'title' => 'Danh sách phòng ban',
            'departments' => $result
        ]);
    }

    public function updateStatus($department_id) {
        $this->department_service->updateStatus($department_id);

        return redirect()->route('departmentList');
    }

    public function changeManager(Request $request) {
        $departmentId = $request->input('department_id');
        $managerId = $request->input('manager_id');

        Department::where('department_id', $departmentId)->update(['manager_id' => $managerId]);
        return response('Cập nhật thành công!');
    }


    public function detail($department_id) {
        $department = department::where('department_id', $department_id)->first();

        return view('department.modal', [
            'title' => 'Phòng ban-Chi tiết',
            'department' => $department
        ]);
    }

    public function staffList($department_id) {
        $department = department::where('department_id', $department_id)->first();

        return view('department.staffList.list', [
            'title' => 'Phòng ban-Nhân viên',
            'department' => $department
        ]);
    }

    public function addStaffToDep($department_id) {
        $staffs = staffs::whereNotIn('department_id', $department_id)->get();

        return view('department.staffList.add', [
            'title' => 'Phòng ban-Thêm NV',
            'staffs' => $staffs,
            'dep_id' => $department_id
        ]);
    }
}
