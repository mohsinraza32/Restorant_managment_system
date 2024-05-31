<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OurServicesController;

class HomePageController extends Controller
{
    public function index()
    {
        $services = app(OurServicesController::class)->showDynamicServices();
        $homeBanner = app(BannerController::class)->showDynamicBanner();
        return view('frontend.home', compact('services', 'homeBanner'));
    }
}
