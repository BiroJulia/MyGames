<?php
namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Builder as IGDB;

class IGDBService
{

    public function fetchPopularGames(): Collection
    {

        return Game::select(['id', 'name', 'hypes', 'rating', 'rating_count', 'cover.url'])
            ->where('hypes', '>=', 30)
            ->where('rating', '>=', 75)
            ->where('rating_count', '>=', 30)
            ->orderBy('popularity', 'desc')
            ->orderBy('rating', 'desc')
            ->limit(20)
            ->with(['cover'])
            ->get();
    }

    public function fetchNewReleases(): Collection
    {
        return Game::select(['id', 'name', 'first_release_date', 'genres.name', 'cover.url'])
            ->where('first_release_date', '>=', now()->subMonth()->timestamp)
            ->orderBy('first_release_date', 'desc')
            ->orderBy('popularity', 'desc')
            ->with(['cover', 'genres'])
            ->limit(15)
            ->get();
    }


    public function searchGames(string $query): Collection
    {
        return Game::select(['id', 'name', 'first_release_date', 'rating', 'cover.url'])
            ->where('name', 'ilike', "%{$query}%")
            ->where('name', 'ilike', "%{$query}%")
            ->with(['cover', 'genres'])
            // ->orderBy('rating', 'desc') 
            ->orderBy('name') 
            ->limit(20)
            ->get();
    }



}