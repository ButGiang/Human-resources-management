<?php

namespace App\Http\Controllers;

use App\Models\staffs;

class homeController extends Controller
{
    public function index() {
        return view('home.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
