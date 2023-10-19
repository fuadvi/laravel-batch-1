<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            "title" => $this->title,
            "description" => $this->description,
            "duration" => $this->duration,
            "release_year" => $this->release_year,
            "director" => $this->director,
            "thumbnail" => $this->thumbnail_url,
            "trailer_url" => $this->trailer_url,
            "film_url" => $this->film_url,
            "genre" => $this->genre,
            "screenings" => $this->screenings->map(fn($data) =>[
                "show_time" => now()->parse( $data->show_time)->format('H:i')
            ])
        ];
    }
}
