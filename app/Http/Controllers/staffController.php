<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Services\staffService;

use App\Models\staffs;

class staffController extends Controller
{
    protected $staff_service;

    public function __construct(staffService $staff_service) {
        $this->staff_service = $staff_service;
    }

    public function index() {
        return view('staff.list', [
            'title' => 'Danh sách nhân viên',
            'staffs' => $this->staff_service->getStaffList()
        ]);
    }

    public function add() {
        return view('staff.add', [
            'title' => 'Thêm nhân viên',
            'today' => Carbon::today()->format('Y-m-d')
        ]);
    }

    public function post_add(Request $request) {
        $result = $this->staff_service->create($request);

        if($result) {
            return redirect()->route('staffList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit(staffs $id) {
        return view('Staff.edit', [
            'title' => 'Chỉnh sửa thông tin nhân viên',
            'staff' => $id
        ]);
    }

    public function post_edit(Request $request, staffs $id) {
        $result = $this->staff_service->update($request, $id);
        
        if($result) {
            return redirect()->route('staffList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function updateStatus(staffs $id) {
        $this->staff_service->updateStatus($id);

        return redirect()->route('staffList');
    }

    public function search(Request $request) {
        $result = $this->staff_service->search($request);

        return view('staff.list',[
            'title' => 'Danh sách nhân viên',
            'staffs' => $result
        ]);
    }
}
