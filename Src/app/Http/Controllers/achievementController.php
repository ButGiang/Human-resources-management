<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\staffs;
use App\Models\achievement;
use App\Http\Requests\achievementRequest;
use App\Http\Services\achievementService;

class achievementController extends Controller
{
    protected $achievement_service;

    public function __construct(achievementService $achievement_service) {
        $this->achievement_service = $achievement_service;
    }

    public function index() {
        return view('achievement.list', [
            'title' => 'Khen thưởng nhân viên',
            'achievements' => achievement::orderBy('achievement_id', 'asc')->get()
        ]);
    }

    public function add() {
        return view('achievement.add', [
            'title' => 'Khen thưởng-Thêm',
            'staffs' => staffs::orderBy('id', 'asc')->get(),
            'today' => Carbon::today()->format('Y-m-d')
        ]);
    }

    public function post_add(achievementRequest $request) {
        $fileName = '';
        if($request->hasFile('image')) {
            $fileName = $request->getSchemeAndHttpHost(). '/assets/img/'. $request->name. '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $fileName); 
        }

        $result = $this->achievement_service->create($request, $fileName);

        if($result) {
            return redirect()->route('achievementList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($achievement_id) {
        $achievement = achievement::where('achievement_id', $achievement_id)->first();
        return view('achievement.edit', [
            'title' => 'Khen thưởng-Chỉnh sửa',
            'achievement' => $achievement
        ]);
    }

    public function post_edit(achievementRequest $request, $achievement_id) {
        $achievement = achievement::where('achievement_id', $achievement_id)->first();
        $result = $this->achievement_service->update($request, $achievement);
        
        if($result) {
            return redirect()->route('achievementList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request) {
        $result = $this->achievement_service->delete($request);

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
        $result = $this->achievement_service->search($request);

        return view('achievement.list',[
            'title' => 'Danh sách khen thưởng',
            'achievements' => $result
        ]);
    }
}
