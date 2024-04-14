<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Main\Admin\AdminDivisionController;
use App\Http\Controllers\Main\Admin\AdminRoleController;
use App\Http\Controllers\Main\Admin\AdminUserController;
use App\Http\Controllers\Main\BootstrapController;
use App\Http\Controllers\Main\QrCodeController;
use App\Http\Controllers\Main\Report\ReportController;
use App\Http\Controllers\Main\Time\TimeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/generate', [QrCodeController::class, 'index'])->name('generate.index');
});

Route::group(['namespace' => 'Main', 'prefix' => 'main', 'middleware' => 'auth'], function () {
    Route::delete('/destroy/logout', [AuthController::class, 'destroy'])->name('auth.destroy');

    Route::get('/', [BootstrapController::class, 'index'])->name('main.index');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/users/', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/user/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/user/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/user/{user}', [AdminUserController::class, 'delete'])->name('admin.users.delete');

        Route::get('/divisions', [AdminDivisionController::class, 'index'])->name('admin.divisions.index');
        Route::get('/divisions/create', [AdminDivisionController::class, 'create'])->name('admin.divisions.create');
        Route::post('/divisions/', [AdminDivisionController::class, 'store'])->name('admin.divisions.store');
        Route::get('/divisions/division/{division}/edit', [AdminDivisionController::class, 'edit'])->name('admin.divisions.edit');
        Route::put('/divisions/division/{division}', [AdminDivisionController::class, 'update'])->name('admin.divisions.update');
        Route::delete('/divisions/division/{division}', [AdminDivisionController::class, 'delete'])->name('admin.divisions.delete');

        Route::get('/roles', [AdminRoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/roles/create', [AdminRoleController::class, 'create'])->name('admin.roles.create');
        Route::post('/roles/', [AdminRoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/roles/role/{role}/edit', [AdminRoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('/roles/role/{role}', [AdminRoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/roles/role/{role}', [AdminRoleController::class, 'delete'])->name('admin.roles.delete');
    });

    Route::group(['namespace' => 'Report', 'prefix' => 'report', 'middleware' => 'looking'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('report.index');
        Route::get('/show', [ReportController::class, 'show'])->name('report.show');
    });

    Route::group(['namespace' => 'Time', 'prefix' => 'time'], function () {
        Route::get('/', [TimeController::class, 'index'])->name('time.index');
        Route::post('/leave/{user}', [TimeController::class, 'leave'])->name('time.leave');
    });
});
