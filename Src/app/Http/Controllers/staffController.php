<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\staffRequest;
use App\Http\Services\staffService;
use App\Helpers\messagesHelper;
use App\Models\staffs;
use App\Models\department;

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

    public function post_add(staffRequest $request) {
        $fileName = '';
        if($request->hasFile('image')) {
            $fileName = $request->getSchemeAndHttpHost(). '/assets/img/'. $request->id. '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $fileName); 
        }

        $result = $this->staff_service->create($request, $fileName);

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
        $this->validate($request, [
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'recruit_day' => 'required|date|before_or_equal:' . Carbon::now()->format('Y-m-d') .
            '|after_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
        ]);

        $result = $this->staff_service->update($request, $id);
        
        if($result) {
            return redirect()->route('staffList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function updateStatus(staffs $id) {
        $managers = department::pluck('manager_id')->toArray();
        if(in_array($id->id, $managers)) {
            Session::flash('error', messagesHelper::$INACTIVE_FAIL);
            return redirect()->back()->withInput();
        }
        else {
            $this->staff_service->updateStatus($id);

            return redirect()->route('staffList');
        }
    }

    public function search(Request $request) {
        $result = $this->staff_service->search($request);

        return view('staff.list',[
            'title' => 'Danh sách nhân viên',
            'staffs' => $result
        ]);
    }
}
