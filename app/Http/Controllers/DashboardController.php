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
        
        return Inertia::render('Dashboard', [
            'games' => $search ? $this->igdb->searchGames($search) :collect(),
            'search' => $search,
            'newReleases' => $this->igdb->fetchNewReleases(),
            'popularGames' => $this->igdb->fetchPopularGames(),
        ]);
    }


}

