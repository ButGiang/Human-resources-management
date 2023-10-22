<?php

namespace App\Http\Services;

use App\Helpers\messagesHelper;
use Carbon\Carbon;

use App\Models\salary;
use App\Models\salarySchedule;
use App\Models\staffs;
use App\Models\achievement;
use App\Models\discipline;


class salaryService {
    public function getSalaryScheduleList() {
        return salarySchedule::orderBy('salarySchedule_id', 'asc')->get();
    }

    public function getSalaryList() {
        $salaries = Salary::orderBy('salary_id', 'asc')->get();
        
        if ($salaries->isEmpty()) {
            Salary::insert([
                'money' => 1,
                'id' => 1,
                'date' => Carbon::today()->format('Y-m-d')
            ]);  
            $salaries = Salary::orderBy('salary_id', 'asc')->get();
        }
        return $salaries;
    }

    public function create($request) {
        try {
            salarySchedule::create([
                'position_id' => $request->input('position'),
                'money' => $request->input('money') 
            ]);
            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $salarySchedule) {
        try{
            $salarySchedule->money = $request->input('money');
            $salarySchedule->save();

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
        $staffs = staffs::select('id')->where('first_name', 'like', '%'. $name. '%')
        ->orWhere('last_name', 'like', '%'. $name. '%')->get();

        if($staffs) {
            return salary::whereIn('id', $staffs)->get();
        }
        else {
            return salary::where('id', -1)->get();
        }
    }

    public function delete($request) {
        $salarySchedule = salarySchedule::where('salarySchedule_id', (int) $request->input('id'))->first();
        
        if($salarySchedule) {
            $salarySchedule->delete();
            return true;
        }
        return false;
    }

    public function caculate($staffs, $month) {
        foreach($staffs as $staff) {
            $fixedSalary = salarySchedule::where('position_id', $staff->position_id)->value('money');
            $achievement_model = new achievement;
            $bonus = $achievement_model->getTotal($staff->id, $month);
            $discipline_model = new discipline;
            $punish = $discipline_model->getTotal($staff->id, $month);

            $salary = $fixedSalary + $bonus - $punish;

            $staff_salary = salary::where('id', $staff->id)->first();
            if ($staff_salary) {
                $staff_salary->update([
                    'money' => $salary,
                    'date' => Carbon::today()->format('Y-m-d')
                ]);
            } 
            else {
                salary::create([
                    'money' => $salary,
                    'date' => Carbon::today()->format('Y-m-d'),
                    'id' => $staff->id
                ]);
            }   
        }
    }
}