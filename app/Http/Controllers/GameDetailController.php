<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IGDBService;
use Inertia\Inertia;

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

        return Inertia::render('GameDetail', [
            'game' => $game
            
        ]);
    }

}
