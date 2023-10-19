<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Services\salaryService;
use Carbon\Carbon;

use App\Models\salarySchedule;
use App\Models\position;
use App\Models\staffs;

class salaryController extends Controller
{
    protected $salary_service;

    public function __construct(salaryService $salary_service) {
        $this->salary_service = $salary_service;
    }

    public function index() {
        $salaryList = $this->salary_service->getSalaryList();
        $date = $salaryList->first()->date;

        return view('salary.list', [
            'title' => 'Lương bổng',
            'salarySchedule' => $this->salary_service->getSalaryScheduleList(),
            'salaryList' => $salaryList,
            'month' => Carbon::parse($date)->format('m')
        ]);
    }

    public function add() {
        $positions = salarySchedule::select('position_id')->get();

        return view('salary.schedule.add', [
            'title' => 'Danh mục lương-Thêm',
            'positions' => position::whereNotIn('position_id', $positions)->get()  
        ]);
    }

    public function post_add(Request $request) {
        $result = $this->salary_service->create($request);

        if($result) {
            return redirect()->route('salaryList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($salarySchedule_id) {
        $salarySchedule = salarySchedule::where('salarySchedule_id', $salarySchedule_id)->first();

        return view('salary.schedule.edit', [
            'title' => 'Danh mục lương-Chỉnh sửa',
            'salarySchedule' => $salarySchedule
        ]);
    }

    public function post_edit(Request $request, $salarySchedule_id) {
        $salarySchedule = salarySchedule::where('salarySchedule_id', $salarySchedule_id)->first();
        $result = $this->salary_service->update($request, $salarySchedule);
        
        if($result) {
            return redirect()->route('salaryList', [
                'salarySchedule' => $result
            ]);
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request) {
        $result = $this->salary_service->delete($request);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function search(Request $request) {
        $result = $this->salary_service->search($request);

        $salaryList = $this->salary_service->getSalaryList();
        $date = $salaryList->first()->date;

        return view('salary.list', [
            'title' => 'Lương bổng',
            'salarySchedule' => $this->salary_service->getSalaryScheduleList(),
            'salaryList' => $result,
            'month' => Carbon::parse($date)->format('m')
        ]);
    }

    public function caculate($month) {
        $staffs = staffs::orderBy('id', 'asc')->get();
        $this->salary_service->caculate($staffs, $month);

        return redirect()->route('salaryList');
    }
}
