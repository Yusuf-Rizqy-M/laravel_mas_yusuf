<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentAdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\GradeAdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Admin\StudentAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/contact', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students-admin', [StudentAdminController::class, 'index']);

Route::get('/grades', [GradeController::class, 'index']);
Route::get('/grades-admin', [GradeAdminController::class, 'index']);

Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/departments-admin', [DepartmentAdminController::class, 'index']);

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/{student}', [StudentController::class, 'show']);
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('students')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\StudentAdminController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\StudentAdminController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\StudentAdminController::class, 'store']);
        Route::get('/edit/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'edit']);
        Route::put('/update/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'update']);
        Route::delete('/delete/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'destroy']);
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('grades')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\GradeAdminController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\GradeAdminController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\GradeAdminController::class, 'store']);
        Route::get('/edit/{grades}', [\App\Http\Controllers\Admin\GradeAdminController::class, 'edit'])
            ->name('admin.grade.edit');
        Route::put('/update/{grades}', [\App\Http\Controllers\Admin\GradeAdminController::class, 'update']);
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('departments')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'store']);
        Route::get('/edit/{department}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'edit'])
            ->name('admin.department.edit');
        Route::put('/update/{department}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'update']);
    });
});
