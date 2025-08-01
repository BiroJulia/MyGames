<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Enums\GameStatusEnum; 

class GameUser extends Pivot
{
    protected $fillable = [
        'user_id',
        'game_id',
        'status',
        'rating',
    ];

    protected $casts = [
        'status' => GameStatusEnum::class,
        'rating' => 'integer',
    ];
}
