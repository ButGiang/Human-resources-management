<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\authController;
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\staffController;
use \App\Http\Controllers\departmentController;
use \App\Http\Controllers\achievementController;
use \App\Http\Controllers\disciplineController;

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

Route::prefix('department')->group(function() {
    Route::get('/', [departmentController::class, 'index'])->name('departmentList');

    Route::get('/add', [departmentController::class, 'add']);
    Route::post('/add', [departmentController::class, 'post_add']);

    Route::get('/edit/{department_id}', [departmentController::class, 'edit']);
    Route::post('/edit/{department_id}', [departmentController::class, 'post_edit']);

    Route::get('/updateStatus/{department_id}', [departmentController::class, 'updateStatus']);
    Route::post('/changeManager', [departmentController::class, 'changeManager']);
    Route::post('/search', [departmentController::class, 'search']);
    Route::get('/detail/{department_id}', [departmentController::class, 'detail']);
});


Route::prefix('achievement')->group(function() {
    Route::get('/', [achievementController::class, 'index'])->name('achievementList');

    Route::get('/add', [achievementController::class, 'add']);
    Route::post('/add', [achievementController::class, 'post_add']);

    Route::get('/edit/{achievement_id}', [achievementController::class, 'edit']);
    Route::post('/edit/{achievement_id}', [achievementController::class, 'post_edit']);

    Route::delete('/delete', [achievementController::class, 'delete']);
    Route::post('/search', [achievementController::class, 'search']);
});

Route::prefix('discipline')->group(function() {
    Route::get('/', [disciplineController::class, 'index'])->name('disciplineList');

    Route::get('/add', [disciplineController::class, 'add']);
    Route::post('/add', [disciplineController::class, 'post_add']);

    Route::get('/edit/{discipline_id}', [disciplineController::class, 'edit']);
    Route::post('/edit/{discipline_id}', [disciplineController::class, 'post_edit']);

    Route::delete('/delete', [disciplineController::class, 'delete']);
    Route::post('/search', [disciplineController::class, 'search']);
});


Route::middleware(['auth'])->group(function() {

});