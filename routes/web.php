<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;




Auth::routes();

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');
 

Route::get('/', [HomePageController::class, 'index'])->name('home');


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

    // home banner
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');

// our services
    Route::get('/our-services', [OurServicesController::class, 'index'])->name('our-services.index');
    Route::get('/our-services/create', [OurServicesController::class, 'create'])->name('our-services.create');
    Route::post('/our-services', [OurServicesController::class, 'store'])->name('our-services.store');
    Route::get('/our-services/{service}/edit', [OurServicesController::class, 'edit'])->name('our-services.edit');
    Route::put('/our-services/{service}', [OurServicesController::class, 'update'])->name('our-services.update');
    Route::delete('/our-services/{service}', [OurServicesController::class, 'destroy'])->name('our-services.destroy');
// our menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{service}/edit', [MenuController::class, 'edit'])->name('our-services.edit');
Route::put('/our-services/{service}', [MenuController::class, 'update'])->name('our-services.update');
Route::delete('/our-services/{service}', [MenuController::class, 'destroy'])->name('our-services.destroy');
});
