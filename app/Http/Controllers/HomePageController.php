<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OurServicesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OurMasterChefController;

class HomePageController extends Controller
{
    public function index()
    {
        $services = app(OurServicesController::class)->showDynamicServices();
        $homeBanner = app(BannerController::class)->showDynamicBanner();
        $homeMenu = app(MenuController::class)->showDynamicMenu();
        $ourchef = app(OurMasterChefController::class)->showDynamicChef();
    
        return view('frontend.home', compact('services', 'homeBanner','homeMenu','ourchef'));
    }
}
