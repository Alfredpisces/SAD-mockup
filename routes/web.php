<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Management\UserController;       // <-- Added \Management back
use App\Http\Controllers\Management\RoleController;       // <-- Added \Management back
use App\Http\Controllers\Management\PermissionController; // <-- Added \Management back
use Illuminate\Support\Facades\Route;

// 1. Redirect Welcome page to Dashboard if logged in
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

// 2. Main System Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Main Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Management Group
    Route::prefix('management')->group(function () {

        // User Management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');

        // Roles & Permissions
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    });

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
