<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\staffs;
use App\Models\department;
use App\Models\position;
use App\Models\degree;

use App\Http\Services\positionService;


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

    public function post_add(Request $request, $department_id) {
        $result = $this->position_service->create($request, $department_id);

        if($result) {
            return redirect()->route('positionList', ['department_id' => $department_id]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($position_id) {
        $position = position::where('position_id', $position_id)->first();

        return view('position.edit', [
            'title' => 'chức vụ-Chỉnh sửa',
            'position' => $position
        ]);
    }

    public function post_edit(Request $request, $position_id) {
        $position = position::where('position_id', $position_id)->first();
        $result = $this->position_service->update($request, $position);
        
        if($result) {
            return redirect()->route('positionList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function search(Request $request) {
        $result = $this->position_service->search($request);

        return view('position.list',[
            'title' => 'Danh sách chức vụ',
            'positions' => $result
        ]);
    }

    public function updateStatus($position_id) {
        $this->position_service->updateStatus($position_id);

        return redirect()->route('positionList');
    }
}
