<?php

namespace App\Enums;

enum GameStatusEnum: string
{
    case Playing = 'playing';
    case Completed = 'completed';
    case OnHold = 'on_hold';
    case Dropped = 'dropped';
    case WantToPlay = 'want_to_play';
}
