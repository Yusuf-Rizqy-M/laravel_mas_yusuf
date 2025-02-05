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
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('error');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/grades', [GradeController::class, 'index']);
    Route::get('/departments', [DepartmentController::class, 'index']);

    // Rute khusus admin dengan middleware 'admin'
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::prefix('students')->group(function () {
            Route::get('/', [StudentAdminController::class, 'index']);
            Route::get('/create', [StudentAdminController::class, 'create']);
            Route::post('/store', [StudentAdminController::class, 'store']);
            Route::get('/edit/{student}', [StudentAdminController::class, 'edit']);
            Route::put('/update/{student}', [StudentAdminController::class, 'update']);
            Route::delete('/delete/{student}', [StudentAdminController::class, 'destroy']);
        });

        Route::prefix('grades')->group(function () {
            Route::get('/', [GradeAdminController::class, 'index']);
            Route::get('/create', [GradeAdminController::class, 'create']);
            Route::post('/store', [GradeAdminController::class, 'store']);
            Route::get('/edit/{grades}', [GradeAdminController::class, 'edit'])->name('admin.grade.edit');
            Route::put('/update/{grades}', [GradeAdminController::class, 'update']);
        });

        Route::prefix('departments')->group(function () {
            Route::get('/', [DepartmentAdminController::class, 'index']);
            Route::get('/create', [DepartmentAdminController::class, 'create']);
            Route::post('/store', [DepartmentAdminController::class, 'store']);
            Route::get('/edit/{department}', [DepartmentAdminController::class, 'edit'])->name('admin.department.edit');
            Route::put('/update/{department}', [DepartmentAdminController::class, 'update']);
        });
    });
});
