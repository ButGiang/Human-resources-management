<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\authController;
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\staffController;


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
});



Route::middleware(['auth'])->group(function() {

});