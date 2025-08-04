<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'developer' => $this->developer ?? null,
            'releaseDate' => $this->release_date ?? $this->first_release_date,
            'coverUrl' => $this->cover?->url ?? null,
            'formattedReleaseDate' => $this->first_release_date->format('Y. m. d.'),
            'summary' => $this->summary,
            'storyline' => $this->storyline,
            'firstReleaseDate' => $this->first_release_date,
            'rating' => $this->rating ? round($this->rating) : 'NS',
            'screenshots' => collect($this->screenshots)->pluck('url') ?? [],
            'videos' => collect($this->videos)->pluck('url') ?? [],
            'platforms' => collect($this->platforms)->pluck('name') ?? [],
            'genres' => collect($this->genres)->pluck('name') ?? [],

        ];
    }
}
