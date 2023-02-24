<?php

namespace App\Services;

use App\Models\BingoGame;

class BingoService
{
    public function current()
    {
        return BingoGame::latest()->first();
    }

    public function sold()
    {

    }
}
