<?php

namespace App\Http\Controllers;

use App\Models\BingoGame;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('back.admin.index'),
            'customer' => redirect()->route('back.customer.index'),
            'user' => redirect()->route('user.index'),
            default => view('index'),
        };
    }

    public function page($page)
    {
        return view('pages.' . $page);
    }
}
