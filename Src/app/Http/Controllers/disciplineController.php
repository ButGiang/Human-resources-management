<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\staffs;
use App\Models\discipline;
use App\Http\Requests\disciplineRequest;
use App\Http\Services\disciplineService;

class disciplineController extends Controller
{
    protected $discipline_service;

    public function __construct(disciplineService $discipline_service) {
        $this->discipline_service = $discipline_service;
    }

    public function index() {
        return view('discipline.list', [
            'title' => 'Danh sách kỷ luật',
            'disciplines' => discipline::orderBy('discipline_id', 'asc')->get()
        ]);
    }

    public function add() {
        return view('discipline.add', [
            'title' => 'Kỷ luật-Thêm',
            'staffs' => staffs::orderBy('id', 'asc')->get(),
            'today' => Carbon::today()->format('Y-m-d')
        ]);
    }

    public function post_add(disciplineRequest $request) {
        $fileName = '';
        if($request->hasFile('image')) {
            $fileName = $request->getSchemeAndHttpHost(). '/assets/img/'. $request->name. '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $fileName); 
        }

        $result = $this->discipline_service->create($request, $fileName);

        if($result) {
            return redirect()->route('disciplineList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($discipline_id) {
        $discipline = discipline::where('discipline_id', $discipline_id)->first();

        return view('discipline.edit', [
            'title' => 'Kỷ luật-Chỉnh sửa',
            'discipline' => $discipline
        ]);
    }

    public function post_edit(disciplineRequest $request, $discipline_id) {
        $discipline = discipline::where('discipline_id', $discipline_id)->first();
        $result = $this->discipline_service->update($request, $discipline);
        
        if($result) {
            return redirect()->route('disciplineList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request) {
        $result = $this->discipline_service->delete($request);

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
        $result = $this->discipline_service->search($request);

        return view('discipline.list',[
            'title' => 'Danh sách kỷ luật',
            'disciplines' => $result
        ]);
    }
}
