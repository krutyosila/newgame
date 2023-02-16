<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'c1',
        'c2',
        'bingo',
        'rompers',
        'first5',
        'first10',
        'minimum',
        'state',
        'color'
    ];

    protected $casts = [
        'state' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
