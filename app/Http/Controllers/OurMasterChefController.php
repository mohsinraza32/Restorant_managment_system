<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\Storage;

class OurMasterChefController extends Controller
{
    public function index(){
        $chef = Chef::all();
        return view("admin.our-chef.index", compact('chef'));
    }  
    
    public function create(){
        return view('admin.our-chef.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Chef::create([
            'full_name' => $request->full_name,
            'designation' => $request->designation,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-chef.index')->with('success', 'Chef created successfully.');
    }
    
    public function edit(Chef $chef){
        return view('admin.chef.edit', compact('chef'));
    }
    
    public function update(Request $request, Chef $chef){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($chef->image_path) {
                Storage::disk('public')->delete($chef->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $chef->image_path;
        }

        $chef->update([
            'full_name' => $request->full_name,
            'designation' => $request->designation,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-chef.index')->with('success', 'Chef updated successfully.');
    }
    
    public function destroy(Chef $chef){
        if ($chef->image_path) {
            Storage::disk('public')->delete($chef->image_path);
        }

        $chef->delete();
        return redirect()->route('our-chef.index')->with('success', 'Chef deleted successfully.');
    }
    
    public function showDynamicChef(){
        $chefs = Chef::all();
        return $chefs;
    }
}
