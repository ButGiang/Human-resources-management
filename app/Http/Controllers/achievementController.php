<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\staffs;
use App\Models\achievement;

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
            'title' => 'Thêm',
            'staffs' => staffs::orderBy('id', 'asc')->get(),
            'today' => Carbon::today()->format('Y-m-d')
        ]);
    }

    public function post_add(Request $request) {
        $result = $this->achievement_service->create($request);

        if($result) {
            return redirect()->route('achievementList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function edit(achievement $id) {
        return view('achievement.edit', [
            'title' => 'Chỉnh sửa',
            'achievement' => $id
        ]);
    }

    public function post_edit(Request $request, achievement $id) {
        $result = $this->achievement_service->update($request, $id);
        
        if($result) {
            return redirect()->route('achievementList');
        }
        else {
            return redirect()->back()->withInput();
        }
    }
}
