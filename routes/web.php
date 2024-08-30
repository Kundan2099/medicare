<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
})->name('view.welcome');


Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'viewLogin'])->name('web.view.login');
    Route::post('login', [AuthController::class, 'handleLogin'])->name('web.handle.login');

    Route::get('register', [AuthController::class, 'viewRegister'])->name('web.view.register');
    Route::post('register', [AuthController::class, 'handleRegister'])->name('web.handle.register');

    Route::get('forgot-password', [AuthController::class, 'viewForgotPassword'])->name('web.view.forgot.password');
    Route::post('forgot-password', [AuthController::class, 'handleForgotPassword'])->name('web.handle.forgot.password');
});


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [DashboardController::class, 'handleLogout'])->name('web.handle.logout');

    Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('web.view.dashboard');
});
