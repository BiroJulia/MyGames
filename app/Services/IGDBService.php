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
            ->orderBy('first_release_date')
            ->with(['cover', 'genres'])
            ->limit(30)
            ->get();
    }


    public function searchGames(string $query): Collection
    {
        return Game::select(['id', 'name', 'first_release_date', 'rating'])
            ->where('name', 'ilike', "%{$query}%")
            ->with(['cover', 'genres'])
            ->orderBy('name')
            ->limit(40)
            ->get();
    }


    public function getGameDetails(int $id): ?Game
    {
        return Game::select([
            'id',
            'name',
            'first_release_date',
            'rating',
            'summary',
            'storyline'
        ])
            ->with([
                'artworks',
                'screenshots',
                'cover',
                'genres',
                'platforms',
                'involved_companies.company'
            ])
            ->find($id);
    }


}