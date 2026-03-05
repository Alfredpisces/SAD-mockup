<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = []; // Placeholder until your model is linked

        // CHANGED: Removed 'management.' to point directly to resources/views/permissions/index.blade.php
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        // CHANGED: Removed 'management.'
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }
}
