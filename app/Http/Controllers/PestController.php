<?php

namespace App\Http\Controllers;

use App\Models\Pest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pests = Pest::all();
        return view('pests.index', compact('pests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pests.create');
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
            'damage_symptoms' => 'required|string',
            'life_cycle' => 'required|string',
            'prevention_methods' => 'required|string',
            'control_methods' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pest_images', 'public');
            $validated['image_path'] = $path;
        }

        Pest::create($validated);

        return redirect()->route('pests.index')
            ->with('success', 'Pest added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pest $pest)
    {
        return view('pests.show', compact('pest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pest $pest)
    {
        return view('pests.edit', compact('pest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pest $pest)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'scientific_name' => 'nullable|string|max:255',
            'damage_symptoms' => 'required|string',
            'life_cycle' => 'required|string',
            'prevention_methods' => 'required|string',
            'control_methods' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($pest->image_path) {
                Storage::disk('public')->delete($pest->image_path);
            }
            $path = $request->file('image')->store('pest_images', 'public');
            $validated['image_path'] = $path;
        }

        $pest->update($validated);

        return redirect()->route('pests.index')
            ->with('success', 'Pest updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pest $pest)
    {
        if ($pest->image_path) {
            Storage::disk('public')->delete($pest->image_path);
        }
        
        $pest->delete();

        return redirect()->route('pests.index')
            ->with('success', 'Pest deleted successfully.');
    }
}
