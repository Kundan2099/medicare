<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ContactEnquiryController;
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

Route::post('/contact-enquiry', [ContactEnquiryController::class, 'handleContactEnquiryCreate'])->name('handle.contact.enquiry.create');

// Route::get('/', function () {
//     return view('welcome');
// })->name('view.welcome');

Route::get('/', function () {
    return view('web.pages.home');
})->name('web.view.home');

Route::get('/home1', function () {
    return view('web.pages.home1');
})->name('web.view.home1');
