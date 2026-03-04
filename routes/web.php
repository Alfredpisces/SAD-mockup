<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// 1. Redirect the Welcome page to the Transaction Index if logged in
Route::get('/', function () {
    return auth()->check() ? redirect()->route('transactions.index') : view('welcome');
});

// 2. Main System Routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    // This makes the "Dashboard" link in the navigation menu show your system
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
    
    // Your Transaction routes
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions/generate', [TransactionController::class, 'generate'])->name('transactions.generate');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';