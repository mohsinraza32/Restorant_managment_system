<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view("admin.menu.index" , compact('menu'));
    }  
}
