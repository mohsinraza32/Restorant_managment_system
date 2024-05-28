<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
 
