<?php

namespace App\Dtos;

class FilmRequestDto
{
    public function __construct(
        public string $title,
        public string $description,
        public string $duration,
        public string $director,
        public string $release_year,
        public string $thumbnail_url,
        public string $trailer_url,
        public string $film_url,
        public string $genre,
    )
    {
    }

    public static function FromRequest(array $request): self
    {
        return new self(
            title: $request['title'],
            description: $request['description'],
            duration: $request['duration'],
            director: $request['director'],
            release_year: $request['release_year'],
            thumbnail_url: $request['thumbnail_url'],
            trailer_url: $request['trailer_url'],
            film_url: $request['film_url'],
            genre: json_encode($request['genre']),
        );
    }


}
