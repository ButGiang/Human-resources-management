<?php

namespace App\Http\Services;

use App\Models\department;
use App\Models\departments;

class departmentService {
    public function getdepartmentList() {
        return department::orderBy('department_id ', 'asc')->paginate(10);
    }

    public function create($request) {
        try {
            department::create([
                'name' => $request->input('name'),
                'describe' => $request->input('describe'),
                'manager_id' => $request->input('manager'),
                'active' => 1
            ]);
            $request->session()->flash('success', 'Thêm mới thành công!');
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $department) {
        try{
            $department->name = $request->input('name');
            $department->describe = $request->input('describe');
            $department->save();

            $request->session()->flash('success', 'Cập nhật thành công');
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
            return department::where('name', 'like', '%'. $name. '%')->get();
        }
        else {
            return department::where('department_id', -1)->get();
        }
    }

    public function updateStatus($department_id) {
        try {
            $department = department::where('department_id', $department_id)->first();

            $currentStatus = $department->active;
            $newStatus = $currentStatus === 1 ? 0 : 1;
            
            $department->update(['active' => $newStatus]);
    
            return response()->json(['success' => true, 'active' => $newStatus]);
        }
        catch(\exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}