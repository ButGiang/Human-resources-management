<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\staffs;

class staffService {
    public function getStaffList() {
        return staffs::with('department')->with('position')->with('degree')->orderBy('id', 'asc')->paginate(10);
    }

    public function create($request) {
        try {
            staffs::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'birthday' => $request->input('birthday'),
                'CCCD' => $request->input('CCCD'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'recruit_day' => $request->input('recruit_day'),
            ]);
            $request->session()->flash('success', 'Thêm nhân viên mới thành công!');
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $staff) {
        try{
            $staff->first_name = $request->input('first_name');
            $staff->last_name = $request->input('last_name');
            $staff->gender = $request->input('gender');
            $staff->birthday = $request->input('birthday');
            $staff->email = $request->input('email');
            $staff->CCCD = $request->input('CCCD');
            $staff->address = $request->input('address');
            $staff->phone = $request->input('phone');
            $staff->recruit_day = $request->input('recruit_day');
            $staff->save();

            $request->session()->flash('success', 'Cập nhật thành công');
        }
        catch(\exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function updateStatus($staff) {
        try {
            $currentStatus = staffs::where('id', $staff->id)->value('active');

            $newStatus = $currentStatus === 1 ? 0 : 1;

            $staff->update(['active' => $newStatus]);
    
            return response()->json(['success' => true, 'active' => $newStatus]);
        }
        catch(\exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function search($request) {
        $name = $request->search;

        if($name) {
            return staffs::where('first_name', 'like', '%'. $name. '%')->orWhere('last_name', 'like', '%'. $name. '%')->get();
        }
        else {
            return staffs::where('id', -1)->get();
        }
    }
}