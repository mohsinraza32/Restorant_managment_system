<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view("admin.menu.index" , compact('menu'));
    }  
    public function create()
    {
        return view('admin.menu.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Menu::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-menu.index')->with('success', 'Menu created successfully.');
    }
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($menu->image_path) {
                Storage::disk('public')->delete($menu->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $menu->image_path;
        }

        $menu->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-menu.index')->with('success', 'Menu updated successfully.');
    }
    public function destroy(Menu $menu)
    {
        if ($menu->image_path) {
            Storage::disk('public')->delete($menu->image_path);
        }

        $menu->delete();
        return redirect()->route('our-menu.index')->with('success', 'Menu deleted successfully.');
    }
    public function showDynamicMenu()
    {
        $menu = Menu::all();
        return $menu;
    }

}
