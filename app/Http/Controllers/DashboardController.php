<?php

namespace App\Http\Controllers;

use MarcReichel\IGDBLaravel\Models\Game;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\IGDBService;

class DashboardController extends Controller
{
    protected IGDBService $igdb;


    public function __construct(IGDBService $igdb)
    {
        $this->igdb = $igdb;
    }

    public function show(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $games = $this->igdb->searchGames($search); 
        } else {
            $games = collect();
        }
        return Inertia::render('Dashboard', [
            'games' => $games,
            'search' => $search,
            'newReleases' => $this->igdb->fetchNewReleases(),
            'popularGames' => $this->igdb->fetchPopularGames(),
        ]);
    }


}

