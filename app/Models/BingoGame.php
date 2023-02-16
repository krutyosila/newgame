<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'numbers',
        'prizes',
        'level',
        'state'
    ];
    protected $casts = [
        'numbers' => 'object',
        'prizes' => 'object',
    ];

    public function transactions()
    {
        return $this->hasMany('App\Models\BingoTransaction');
    }
}
