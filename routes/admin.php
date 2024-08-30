<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/hello', function () {
    print('hello');
});

Route::get('/login', [LoginController::class, 'viewLogin'])->name('admin.view.login');
Route::post('/logins', [LoginController::class, 'handleLogin'])->name('admin.handle.login');

//Admin Forgot-Password
Route::get('/forgot-password', [LoginController::class, 'viewForgotPassword'])->name('admin.view.forgot.password');
Route::post('/forgote-password', [LoginController::class, 'handleForgotPassword'])->name('admin.handle.forgot.password');

Route::middleware(['auth:admin'])->group(function () {

    Route::post('/logout', [DashboardController::class, 'handleLogout'])->name('admin.handle.logout');

    Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('admin.view.dashboard');
});
