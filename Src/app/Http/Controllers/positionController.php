<?php

namespace App\Http\Controllers;

use App\Http\Requests\position_staffRequest;
use App\Http\Requests\positionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\positionService;
use App\Helpers\messagesHelper;

use App\Models\staffs;
use App\Models\department;
use App\Models\position;
use App\Models\degree;

class positionController extends Controller
{
    protected $position_service;

    public function __construct(positionService $position_service) {
        $this->position_service = $position_service;
    }

    public function index($department_id) {
        $department = department::where('department_id', $department_id)->first();

        return view('position.list', [
            'title' => 'Danh sách chức vụ',
            'department' => $department,
            'positions' => position::orderBy('position_id', 'asc')->get()
        ]);
    }

    public function add() {
        return view('position.add', [
            'title' => 'chức vụ-Thêm',
        ]);
    }

    public function post_add(positionRequest $request, $department_id) {
        $result = $this->position_service->create($request, $department_id);

        if($result) {
            return redirect()->route('positionList', ['department_id' => $department_id]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($department_id, $position_id) {
        $position = position::where('position_id', $position_id)->first();

        return view('position.edit', [
            'title' => 'chức vụ-Chỉnh sửa',
            'position' => $position
        ]);
    }

    public function post_edit(positionRequest $request, $department_id, $position_id) {
        $position = position::where('position_id', $position_id)->first();
        $result = $this->position_service->update($request, $position);
        
        if($result) {
            return redirect()->route('positionList', ['department_id' => $department_id]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function search(Request $request, $department_id) {
        $result = $this->position_service->search($request);
        $department = department::where('department_id', $department_id)->first();

        return view('position.list',[
            'title' => 'Danh sách chức vụ',
            'positions' => $result,
            'department' => $department
        ]);
    }

    public function updateStatus($department_id, $position_id) {
        $haveStaffInPos = staffs::pluck('position_id')->toArray();
        if(in_array($position_id, $haveStaffInPos)) {
            Session::flash('error', messagesHelper::$INACTIVE_POS_FAIL);
            return redirect()->back();
        }

        $this->position_service->updateStatus($position_id);

        return redirect()->route('positionList', ['department_id' => $department_id]);
    }


    public function detail($department_id, $position_id) {
        $position = position::where('position_id', $position_id)->first();
        $staffs = staffs::where('department_id', $department_id)->where('position_id', $position_id)->get();

        return view('position.staffs.list', [
            'title' => 'Chức vụ-danh sách NV',
            'staffs' => $staffs,
            'position' => $position,
            'department' => $department_id
        ]);
    }

    public function addStaffToPos($department_id, $position_id) {
        $staffs = staffs::where('department_id', $department_id)->where(function ($query) use($position_id) {
            $query->where('position_id', '<>', $position_id)->orWhereNull('position_id');
        })->get();
        $position  = position::where('position_id', $position_id)->get();
        $degrees = degree::orderBy('degree_id', 'asc')->get();

        return view('position.staffs.add', [
            'title' => 'Chức vụ-Thêm NV',
            'staffs' => $staffs,
            'position' => $position,
            'degrees' => $degrees
        ]);
    }

    public function post_addStaffToPos($department_id, $position_id, position_staffRequest $request) {
        $result = $this->position_service->addStaffToPos($department_id, $position_id, $request);

        if($result) {
            return redirect()->route('staffListOfPos', [
                'department_id' => $department_id, 
                'position_id' => $position_id
            ]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function removeStaffFromPos($department_id, $position_id, $id) {
        $managers = department::pluck('manager_id')->toArray();
        if(in_array($id, $managers)) {
            Session::flash('error', messagesHelper::$REMOVE_FAIL);
            return redirect()->back()->withInput();
        }
        else {
            $result = $this->position_service->remove($id);

            if($result) {
                return redirect()->route('staffListOfPos', [
                    'department_id' => $department_id, 
                    'position_id' => $position_id
                ]);
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function exportExcel($department_id) {

    }
}
