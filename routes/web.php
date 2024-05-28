<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;




Auth::routes();

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
 
Route::get('/', function () {
    return view('frontend.home');
})->name('home');