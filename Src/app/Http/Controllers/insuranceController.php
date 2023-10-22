<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\insuranceService;
use App\Http\Requests\insuranceRequest;
use App\Models\insurance;

class insuranceController extends Controller
{
    protected $insurance_service;

    public function __construct(insuranceService $insurance_service) {
        $this->insurance_service = $insurance_service;
    }

    public function index() {
        return view('insurance.list', [
            'title' => 'Danh sách bảo hiểm',
            'insurances' => $this->insurance_service->getStaffsHaveInsurance(),
            'notHaveInsurance' => $this->insurance_service->getStaffsNotHaveInsurance()
        ]);
    }

    public function add() {
        return view('insurance.add', [
            'title' => 'Bảo hiểm-Thêm',
            'staffs' =>  $this->insurance_service->getStaffsNotHaveInsurance()
        ]);
    }

    public function post_add(insuranceRequest $request) {
        $result = $this->insurance_service->create($request);

        if($result) {
            return redirect()->route('insuranceList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($id) {
        $insurance = insurance::where('id', $id)->first();

        return view('insurance.edit', [
            'title' => 'Chỉnh sửa thông tin bảo hiểm',
            'insurance' => $insurance
        ]);
    }

    public function post_edit(insuranceRequest $request, $id) {
        $insurance = insurance::where('id', $id)->first();
        $result = $this->insurance_service->update($request, $insurance);
        
        if($result) {
            return redirect()->route('insuranceList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function search(Request $request) {
        $result = $this->insurance_service->search($request);

        return view('insurance.list', [
            'title' => 'Danh sách bảo hiểm',
            'insurances' => $result,
            'notHaveInsurance' => $this->insurance_service->getStaffsNotHaveInsurance()
        ]);
    }

    public function delete(Request $request) {
        $result = $this->insurance_service->delete($request);

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
}
