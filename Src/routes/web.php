<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\authController;
use \App\Http\Controllers\homeController;
use \App\Http\Controllers\staffController;
use \App\Http\Controllers\insuranceController;
use \App\Http\Controllers\departmentController;
use \App\Http\Controllers\positionController;
use \App\Http\Controllers\achievementController;
use \App\Http\Controllers\disciplineController;
use \App\Http\Controllers\salaryController;
use \App\Http\Controllers\experienceController;

Route::get('login', [authController::class, 'login'])->name('login');
Route::post('login', [authController::class, 'post_login']);
Route::get('register', [authController::class, 'register'])->name('register');
Route::post('register', [authController::class, 'post_register']);


Route::middleware(['auth'])->group(function() {
  
});

Route::get('/', [homeController::class, 'index'])->name('dashboard');


Route::prefix('staff')->group(function() {
    Route::get('/', [staffController::class, 'index'])->name('staffList');

    Route::get('/add', [staffController::class, 'add']);
    Route::post('/add', [staffController::class, 'post_add']);

    Route::get('/edit/{id}', [StaffController::class, 'edit']);
    Route::post('/edit/{id}', [StaffController::class, 'post_edit']);

    Route::get('/updateStatus/{id}', [StaffController::class, 'updateStatus']);
    Route::post('/search', [StaffController::class, 'search']);

    Route::prefix('experience/{id}')->group(function() {
        Route::get('/', [experienceController::class, 'index']);
        Route::get('/add', [experienceController::class, 'add']);
        Route::post('/add', [experienceController::class, 'post_add']);
        Route::get('/edit', [experienceController::class, 'edit']);
        Route::post('/edit', [experienceController::class, 'post_edit']);
        Route::delete('/delete', [experienceController::class, 'delete']);
    });
});


Route::prefix('insurance')->group(function() {
    Route::get('/', [insuranceController::class, 'index'])->name('insuranceList');

    Route::get('/add', [insuranceController::class, 'add']);
    Route::post('/add', [insuranceController::class, 'post_add']);

    Route::get('/edit/{id}', [insuranceController::class, 'edit']);
    Route::post('/edit/{id}', [insuranceController::class, 'post_edit']);

    Route::post('/search', [insuranceController::class, 'search']);
    Route::delete('/delete', [insuranceController::class, 'delete']);
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

    Route::prefix('/detail/{department_id}')->group(function() {
        Route::get('/', [departmentController::class, 'detail']);

        Route::prefix('/staffs')->group(function() {
            Route::get('/', [departmentController::class, 'staffList'])->name('staffListOfDep');
            Route::get('/add', [departmentController::class, 'addStaffToDep']);
            Route::post('/add', [departmentController::class, 'post_addStaffToDep']);
            Route::get('/remove/{id}', [departmentController::class, 'removeStaffFromDep']);
            Route::get('/exportExcel', [departmentController::class, 'exportExcel']);
        });

        Route::prefix('/positions')->group(function() {
            Route::get('/', [positionController::class, 'index'])->name('positionList');
            Route::get('/add', [positionController::class, 'add']);
            Route::post('/add', [positionController::class, 'post_add']);      
            Route::get('/edit/{position_id}', [positionController::class, 'edit']);
            Route::post('/edit/{position_id}', [positionController::class, 'post_edit']);
            Route::get('/updateStatus/{position_id}', [positionController::class, 'updateStatus']);
            Route::post('/search', [positionController::class, 'search']);

            Route::prefix('/detail/{position_id}')->group(function() {
                Route::get('/', [positionController::class, 'detail'])->name('staffListOfPos');
                Route::get('/add', [positionController::class, 'addStaffToPos']);
                Route::post('/add', [positionController::class, 'post_addStaffToPos']);
                Route::get('/remove/{id}', [positionController::class, 'removeStaffFromPos']);
                Route::get('/exportExcel', [positionController::class, 'exportExcel']);
            });
        });
    });
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

Route::prefix('salary')->group(function() {
    Route::get('/', [salaryController::class, 'index'])->name('salaryList');
    Route::post('/search', [salaryController::class, 'search']);
    Route::post('/caculate/{month}', [salaryController::class, 'caculate']);

    Route::prefix('schedule')->group(function() {
        Route::get('/add', [salaryController::class, 'add']);
        Route::post('/add', [salaryController::class, 'post_add']);
        Route::get('/edit/{salarySchedule_id}', [salaryController::class, 'edit']);
        Route::post('/edit/{salarySchedule_id}', [salaryController::class, 'post_edit']);
        Route::delete('/delete', [salaryController::class, 'delete']);
    });
});      