<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Krutyosila\Authentications\Traits\UserAuthenticationTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserAuthenticationTrait;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'username',
        'role',
        'bayonet',
        'balance',
        'limitless',
        'last_seen',
        'detail'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'bayonet' => 'boolean',
        'detail' => 'object'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\BingoRoom')->orderBy('price', 'ASC');
    }

    public function bingoTransactions()
    {
        return $this->hasMany('App\Models\BingoTransaction')->orderBy('id', 'DESC');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction')->orderBy('id', 'DESC');
    }


    public function ownTransactions()
    {
        return $this->hasMany('App\Models\Transaction', 'owner_id')->orderBy('id', 'DESC');
    }

    public function favoriteCards()
    {
        return $this->hasMany('App\Models\BingoFavorite')->orderBy('card', 'ASC');
    }

    public function lastAuthentications($limit = 5)
    {
        return $this->authentications()->orderBy('created_at', 'DESC')->simplePaginate($limit);
    }
}
