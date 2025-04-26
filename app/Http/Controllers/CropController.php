<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crops = Crop::all();
        return view('crops.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'scientific_name' => 'nullable|string|max:255',
            'growing_conditions' => 'required|string',
            'harvesting_period' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('crop_images', 'public');
            $validated['image_path'] = $path;
        }

        Crop::create($validated);

        return redirect()->route('crops.index')
            ->with('success', 'Crop added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crop $crop)
    {
        return view('crops.edit', compact('crop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crop $crop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'scientific_name' => 'nullable|string|max:255',
            'growing_conditions' => 'required|string',
            'harvesting_period' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($crop->image_path) {
                Storage::disk('public')->delete($crop->image_path);
            }
            $path = $request->file('image')->store('crop_images', 'public');
            $validated['image_path'] = $path;
        }

        $crop->update($validated);

        return redirect()->route('crops.index')
            ->with('success', 'Crop updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
        if ($crop->image_path) {
            Storage::disk('public')->delete($crop->image_path);
        }
        
        $crop->delete();

        return redirect()->route('crops.index')
            ->with('success', 'Crop deleted successfully.');
    }
}
