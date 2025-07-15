<?php

namespace App\Http\Controllers;

use MarcReichel\IGDBLaravel\Models\Game;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\IGDBService;

class GameController extends Controller
{
    public function show()
    {
        $game = Game::where('name', 'Stardew Valley')->first();
        return Inertia::render('Games', [
            'game' => $game,
        ]);
    }


}

