<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customers = auth()->user()->users()->orderBy('username', 'ASC')->simplePaginate(10);
        $total = auth()->user()->users()->sum('balance');
        return view('admin.index', compact('customers', 'total'));
    }

    public function finance()
    {
        $transactions = auth()->user()->ownTransactions()->where(['subtype' => 'wallet.admin'])->simplePaginate(20);
        return view('admin.finance', compact('transactions'));
    }
}
