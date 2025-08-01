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
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->using(GameUser::class)
                    ->withPivot(['status', 'rating'])
                    ->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

