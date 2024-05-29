<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;




Auth::routes();

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
 
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/service', function () {
    return view('frontend.service');
})->name('service');
Route::get('/menu', function () {
    return view('frontend.menu');
})->name('menu');
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');
Route::get('/booking', function () {
    return view('frontend.booking');
})->name('booking');