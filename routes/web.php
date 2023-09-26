<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\authController;
use \App\Http\Controllers\homeController;


Route::get('/', function () {
    return view('layout', ['title' => 'abc']);
});

route::get('/login', [authController::class, 'login'])->name('login');
route::post('/login', [authController::class, 'post_login']);
route::get('/register', [authController::class, 'register'])->name('register');
route::post('/register', [authController::class, 'post_register']);
route::get('/dashboard', [homeController::class, 'index'])->name('dashboard');
// Route::middleware(['auth'])->group(function() {

// });