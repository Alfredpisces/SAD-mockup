<?php

namespace App\Http\Controllers; // <-- Must match exactly

use Illuminate\Http\Request;

class DashboardController extends Controller // <-- Must match the filename exactly
{
    public function index()
    {
        return view('dashboard.index');
    }
}
