<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PestController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\PestManagementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

// Home page - redirect to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication routes
Auth::routes();

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Pest Routes
    Route::resource('pests', PestController::class);
    
    // Crop Routes
    Route::resource('crops', CropController::class);
    
    // Pest Management Routes
    Route::resource('pest-management', PestManagementController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
