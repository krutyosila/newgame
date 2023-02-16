<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'owner_id',
        'uuid',
        'type',
        'subtype',
        'detail',
        'bingo_transaction_id',
        'amount'
    ];

    protected $casts = [
        'detail' => 'object'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function owner()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function bingoTransaction()
    {
        return $this->belongsTo('App\Models\BingoTransaction');
    }
}
