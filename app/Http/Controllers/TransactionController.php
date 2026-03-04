<?php

namespace App\Http\Controllers;

use App\Models\SyntheticTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
{
    // Fetch transactions, latest first
    $transactions = SyntheticTransaction::orderBy('transaction_at', 'desc')->paginate(15);
    
    // Package the stats into an array called $stats to match the Blade file
    $stats = [
        'total' => SyntheticTransaction::count(),
        'fraud' => SyntheticTransaction::where('is_fraud', true)->count(),
    ];
    
    return view('transaction.index', compact('transactions', 'stats'));
}

    public function generate(Request $request)
    {
        $type = $request->input('type'); // 'farmer' or 'mule'
        $count = $request->input('count', 10);

        if ($type == 'farmer') {
            SyntheticTransaction::factory()->count($count)->farmer()->create();
        } else {
            SyntheticTransaction::factory()->count($count)->mule()->create();
        }

        return redirect()->back()->with('success', "Successfully generated $count $type transactions!");
    }
}