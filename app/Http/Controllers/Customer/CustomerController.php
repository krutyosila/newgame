<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class CustomerController extends Controller
{
    public function index()
    {
        $users = auth()->user()->users()->orderBy('username', 'ASC')->simplePaginate(10);
        $total = auth()->user()->users()->sum('balance');
        return view('customer.index', compact('users', 'total'));
    }

    public function finance()
    {
        $transactions = auth()->user()->ownTransactions()->where(['subtype' => 'wallet.customer'])->simplePaginate(20);
        return view('customer.finance', compact('transactions'));
    }
}
