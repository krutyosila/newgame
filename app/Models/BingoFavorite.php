<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'card', 'user_id'
    ];
}
