<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Pest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $crops = Crop::with('pests')->get();
        $pests = Pest::with('crops')->get();
        
        return view('dashboard', compact('crops', 'pests'));
    }
} 