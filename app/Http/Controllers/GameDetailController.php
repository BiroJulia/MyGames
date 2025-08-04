<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IGDBService;
use Inertia\Inertia;
use App\Http\Resources\GameDetailResource;

class GameDetailController extends Controller
{
    protected IGDBService $igdb;


    public function __construct(IGDBService $igdb)
    {
        $this->igdb = $igdb;
    }
    public function show(int $id)
    {
        $game = $this->igdb->getGameDetails($id);

        if (!$game) {
            abort(404);
        }

        $gameResource = GameDetailResource::make($game);
        // dd(GameDetailResource::make($game)->resolve());
        return Inertia::render('GameDetail', [
            'game' => $gameResource->toArray(request()),
            
            
        ]);
    }

}
