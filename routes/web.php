<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OurMasterChefController;
use App\Http\Controllers\ReservationController;




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
Route::get('/chef', function () {
    return view('frontend.chef');
})->name('chef');







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
Route::get('/our-menu', [MenuController::class, 'index'])->name('our-menu.index');
Route::get('/our-menu/create', [MenuController::class, 'create'])->name('our-menu.create');
Route::post('/our-menu', [MenuController::class, 'store'])->name('our-menu.store');
Route::get('/our-menu/{menu}/edit', [MenuController::class, 'edit'])->name('our-menu.edit');
Route::put('/our-menu/{menu}', [MenuController::class, 'update'])->name('our-menu.update');
Route::delete('/our-menu/{menu}', [MenuController::class, 'destroy'])->name('our-menu.destroy');

// our chef
Route::get('/our-chef', [OurMasterChefController::class, 'index'])->name('our-chef.index');
Route::get('/our-chef/create', [OurMasterChefController::class, 'create'])->name('our-chef.create');
Route::post('/our-chef', [OurMasterChefController::class, 'store'])->name('our-chef.store');
Route::get('/our-chef/{chef}/edit', [OurMasterChefController::class, 'edit'])->name('our-chef.edit');
Route::put('/our-chef/{chef}', [OurMasterChefController::class, 'update'])->name('our-chef.update');
Route::delete('/our-chef/{chef}', [OurMasterChefController::class, 'destroy'])->name('our-chef.destroy');
// reservation
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservations.store');
});
