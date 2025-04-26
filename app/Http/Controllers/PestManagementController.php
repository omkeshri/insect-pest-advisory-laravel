<?php

namespace App\Http\Controllers;

use App\Models\Pest;
use App\Models\Crop;
use App\Models\PestManagement;
use Illuminate\Http\Request;

class PestManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pestManagements = PestManagement::with(['pest', 'crop'])->get();
        return view('pest_management.index', compact('pestManagements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pests = Pest::all();
        $crops = Crop::all();
        return view('pest_management.create', compact('pests', 'crops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pest_id' => 'required|exists:pests,id',
            'crop_id' => 'required|exists:crops,id',
            'management_strategy' => 'required|string',
            'chemical_control' => 'nullable|string',
            'biological_control' => 'nullable|string',
            'cultural_control' => 'nullable|string',
            'preventive_measures' => 'required|string',
        ]);

        PestManagement::create($validated);

        return redirect()->route('pest-management.index')
            ->with('success', 'Pest management strategy added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PestManagement $pestManagement)
    {
        $pestManagement->load(['pest', 'crop']);
        return view('pest_management.show', compact('pestManagement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PestManagement $pestManagement)
    {
        $pests = Pest::all();
        $crops = Crop::all();
        return view('pest_management.edit', compact('pestManagement', 'pests', 'crops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PestManagement $pestManagement)
    {
        $validated = $request->validate([
            'pest_id' => 'required|exists:pests,id',
            'crop_id' => 'required|exists:crops,id',
            'management_strategy' => 'required|string',
            'chemical_control' => 'nullable|string',
            'biological_control' => 'nullable|string',
            'cultural_control' => 'nullable|string',
            'preventive_measures' => 'required|string',
        ]);

        $pestManagement->update($validated);

        return redirect()->route('pest-management.index')
            ->with('success', 'Pest management strategy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PestManagement $pestManagement)
    {
        $pestManagement->delete();

        return redirect()->route('pest-management.index')
            ->with('success', 'Pest management strategy deleted successfully.');
    }
}
