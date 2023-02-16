<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'bingo_id',
        'type',
        'card'
    ];

    public function bingo()
    {
        return $this->belongsTo('App\Models\BingoGame');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\BingoGame');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\BingoGame');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
