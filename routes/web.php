<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;




Auth::routes();

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
 

Route::get('/', [BannerController::class, 'showDynamicBanner'])->name('home');


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





Route::middleware(['auth'])->group(function () {
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});
