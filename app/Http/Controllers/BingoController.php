<?php

namespace App\Http\Controllers;

use App\Models\BingoGame;
use Illuminate\Http\Request;

class BingoController extends Controller
{
    public function index($id)
    {
        $user = auth()->user();
        $room = $user->user->rooms()->findOrFail($id);
        return view('bingo.index', compact('room'));
    }

    public function histories()
    {
        $histories = BingoGame::where('state', 'end')->orderBy('id', 'DESC')->simplePaginate(10);
        return view('bingo.histories', compact('histories'));
    }
}
