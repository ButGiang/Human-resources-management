<?php

namespace App\Http\Services;

use App\Models\department;
use App\Models\staffs;
use App\Helpers\messagesHelper;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
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


    public function addStaffToDep($department_id, $request) {
        try {
            $staff = staffs::where('id', $request->staff)->first();
            $staff->department_id = $department_id;
            $staff->position_id = $request->position;
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
            $staff->department_id = null;
            $staff->position_id = null;
            $staff->degree_id = null;
            $staff->save();

            return true;
        }
        return false;
    }

    public function staffListExport($department_id, $staffs) {
        $spreadsheet  = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Họ & tên đệm')
            ->setCellValue('C1', 'Tên')
            ->setCellValue('D1', 'Chức vụ')
            ->setCellValue('E1', 'Trình độ');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
    }
}