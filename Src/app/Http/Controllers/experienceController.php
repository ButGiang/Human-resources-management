<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\experience;
use App\Models\staffs;

class experienceController extends Controller
{
    public function index($id) {
        return view('staff.experience.index', [
            'title' => 'Kinh nghiệm làm việc',
            'experiences' => experience::where('id', $id)->get(),
            'staff' => staffs::where('id', $id)->first()
        ]);
    }
}
