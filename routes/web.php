<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\authController;
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\staffController;
use \App\Http\Controllers\achievementController;

Route::get('login', [authController::class, 'login'])->name('login');
Route::post('login', [authController::class, 'post_login']);
Route::get('register', [authController::class, 'register'])->name('register');
Route::post('register', [authController::class, 'post_register']);


Route::get('/', [homeController::class, 'index'])->name('dashboard');

Route::prefix('staff')->group(function() {
    Route::get('/', [staffController::class, 'index'])->name('staffList');

    Route::get('/add', [staffController::class, 'add']);
    Route::post('/add', [staffController::class, 'post_add']);

    Route::get('/edit/{id}', [StaffController::class, 'edit']);
    Route::post('/edit/{id}', [StaffController::class, 'post_edit']);

    Route::get('/updateStatus/{id}', [StaffController::class, 'updateStatus']);
    Route::post('/search', [StaffController::class, 'search']);
});

Route::prefix('achievement')->group(function() {
    Route::get('/', [achievementController::class, 'index'])->name('achievementList');

    Route::get('/add', [achievementController::class, 'add']);
    Route::post('/add', [achievementController::class, 'post_add']);

    Route::get('/edit/{achievement_id}', [achievementController::class, 'edit']);
    Route::post('/edit/{achievement_id}', [achievementController::class, 'post_edit']);
});

Route::middleware(['auth'])->group(function() {

});