<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BingoGame;

class UserController extends Controller
{
    public function index()
    {
        $rooms = auth()->user()->user->rooms()->where('state', true)->get();
        return view('user.index', compact('rooms'));
    }

    public function finance()
    {
        $transactions = auth()->user()->transactions()->simplePaginate(5);
        return view('user.finance', compact('transactions'));
    }

}
