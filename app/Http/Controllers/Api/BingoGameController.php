<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BingoRoom;
use App\Services\BingoService;
use Illuminate\Http\Request;

class BingoGameController extends Controller
{
    /**
     * @var BingoService
     */
    public BingoService $bingoService;

    public function __construct(BingoService $bingoService)
    {
        $this->bingoService = $bingoService;
    }

    public function current()
    {
        return response()->json($this->bingoService->current());
    }

    public function room($id)
    {

        $room = BingoRoom::findOrFail($id);
        $owner = $room->user;
        $current = $this->bingoService->current();
        $sold = $current?->transactions()->where('bingo_room_id', $room->id)->pluck('card');

        $response = [

        ];
        dd($owner->toArray(), $room->toArray(), $current->toArray(), $sold->toArray());

    }

    public function cards($roomId)
    {


    }

    public function buy(Request $request)
    {

    }

    public function update(Request $request)
    {

    }
}
