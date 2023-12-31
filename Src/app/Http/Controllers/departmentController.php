<?php

namespace App\Http\Controllers;

use App\Http\Requests\department_staffRequest;
use Illuminate\Http\Request;
use App\Http\Requests\departmentRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Services\departmentService;
use App\Helpers\messagesHelper;
use App\Exports\dep_staffList;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\staffs;
use App\Models\department;
use App\Models\position;
use App\Models\degree;

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

    public function post_add(departmentRequest $request) {
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
        $staffs = staffs::where('department_id', $department_id)->whereNotIn('id', [$department->manager_id])->where('active', 1)->get();

        return view('department.edit', [
            'title' => 'Phòng ban-Chỉnh sửa',
            'department' => $department,
            'staffs' => $staffs
        ]);
    }

    public function post_edit(departmentRequest $request, $department_id) {
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
        $haveStaffInDep = staffs::pluck('department_id')->toArray();
        if(in_array($department_id, $haveStaffInDep)) {
            Session::flash('error', messagesHelper::$INACTIVE_DEP_FAIL);
            return redirect()->back();
        }

        $this->department_service->updateStatus($department_id);

        return redirect()->route('departmentList');
    }

    public function changeManager(Request $request) {
        $departmentId = $request->input('department_id');
        $managerId = $request->input('manager_id');

        Department::where('department_id', $departmentId)->update(['manager_id' => $managerId]);
        return response(messagesHelper::$UPDATE_SUCCESS);
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
        $department = department::where('department_id', $department_id)->first();
        $staffs = staffs::where('department_id', '<>', $department_id)->orWhereNull('department_id')->get();
        $positions  = position::where('department_id', $department_id)->get();
        $degrees = degree::orderBy('degree_id', 'asc')->get();

        return view('department.staffList.add', [
            'title' => 'Phòng ban-Thêm NV',
            'staffs' => $staffs,
            'department' => $department,
            'positions' => $positions,
            'degrees' => $degrees
        ]);
    }

    public function post_addStaffToDep($department_id, department_staffRequest $request) {
        $result = $this->department_service->addStaffToDep($department_id, $request);

        if($result) {
            return redirect()->route('staffListOfDep', ['department_id' => $department_id]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function removeStaffFromDep($department_id, $id) {
        $managers = department::pluck('manager_id')->toArray();
        if(in_array($id, $managers)) {
            Session::flash('error', messagesHelper::$REMOVE_FAIL);
            return redirect()->back()->withInput();
        }
        else {
            $result = $this->department_service->remove($id);

            if($result) {
                return redirect()->route('staffListOfDep', ['department_id' => $department_id]);
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function exportExcel($department_id) {
        return Excel::download(new dep_staffList, 'staffs.xlsx');
    }
}
