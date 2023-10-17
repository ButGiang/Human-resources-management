<?php

namespace App\Http\Services;

use App\Models\department;
use App\Models\position;
use App\Models\staffs;
use App\Helpers\messagesHelper;

class positionService {
    public function getPositionList() {
        return position::orderBy('position_id ', 'asc')->with('department')->paginate(10);
    }

    public function create($request, $department_id) {
        try {
            position::create([
                'name' => $request->input('name'),
                'department_id' => $department_id,
                'active' => 1
            ]);
            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $position) {
        try{
            $position->name = $request->input('name');
            $position->save();

            $request->session()->flash('success', messagesHelper::$EDIT_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function search($request) {
        $name = $request->search;

        if($name) {
            return position::where('name', 'like', '%'. $name. '%')->get();
        }
        else {
            return position::where('position_id', -1)->get();
        }
    }

    public function updateStatus($position_id) {
        try {
            $position = position::where('position_id', $position_id)->first();

            $currentStatus = $position->active;
            $newStatus = $currentStatus === 1 ? 0 : 1;
            
            $position->update(['active' => $newStatus]);
    
            return response()->json(['success' => true, 'active' => $newStatus]);
        }
        catch(\exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    
    public function addStaffToPos($department_id, $position_id, $request) {
        try {
            $staff = staffs::where('id', $request->staff)->first();
            $staff->department_id = $department_id;
            $staff->position_id = $position_id;
            $staff->degree_id = $request->degree;
            $staff->save();

            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function remove($id) {
        $staff = staffs::where('id', $id)->first();

        if($staff) {
            $staff->position_id = null;
            $staff->degree_id = null;
            $staff->save();

            return true;
        }
        return false;
    }

    public function staffListExport($department_id, $staffs) {

    }
}