<?php

namespace App\Http\Services;

use App\Helpers\messagesHelper;

use App\Models\insurance;
use App\Models\staffs;

class insuranceService {
    public function getInsuranceList() {
        return insurance::select('id')->get();
    }

    public function getStaffsHaveInsurance() {
        $ids = $this->getInsuranceList();
        return insurance::whereIn('id', $ids)->get();
    }

    public function getStaffsNotHaveInsurance() {
        $ids = $this->getInsuranceList();
        return staffs::whereNotIn('id', $ids)->get();
    }

    public function create($request) {
        try {
            insurance::create([
                'insurance_id' => $request->input('insurance_id'),
                'registration_date' => $request->input('registration_date'),
                'register_place' => $request->input('register_place'),
                'hospital' => $request->input('hospital'),
                'id' => $request->input('staff'),
            ]);
            $request->session()->flash('success', messagesHelper::$CREATE_SUCCESS);
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $insurance) {
        try{
            $insurance->insurance_id = $request->input('insurance_id');
            $insurance->registration_date = $request->input('registration_date');
            $insurance->register_place = $request->input('register_place');
            $insurance->hospital = $request->input('hospital');
            $insurance->save();

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
            $staffs = staffs::select('id')->where('first_name', 'like', '%'. $name. '%')->orWhere('last_name', 'like', '%'. $name. '%')->get();
            return insurance::whereIn('id', $staffs)->get();
        }
        else {
            return insurance::where('id', -1)->get();
        }
    }

    public function delete($request) {
        $insurance = insurance::where('insurance_id', (int) $request->input('id'))->first();
        
        if($insurance) {
            $insurance->delete();
            return true;
        }
        return false;
    }
}