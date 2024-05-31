<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view("admin.our-services.index", compact('services'));
    }
    public function create()
    {
        return view('admin.our-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-services.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.our-services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $service->image_path;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('our-services.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }

        $service->delete();
        return redirect()->route('our-services.index')->with('success', 'Banner deleted successfully.');
    }
    public function showDynamicServices()
    {
        $services = Service::all();
        return $services;
    }
}
