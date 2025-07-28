<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'developer',
        'release_date',
        'cover_url',
    ];
    public function userGames()
    {
        return $this->hasMany(UserGame::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genres');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

