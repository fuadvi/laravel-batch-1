<?php

namespace App\Repository\film;

use App\Models\Film;

class FilmRepository implements IFilmRepository
{
    public function __construct(
        protected Film $film
    )
    {
    }

    public function add(array $data)
    {
       $film =  $this->film->create($data);
       $film->load('screenings');
       return $film;
    }

    public function addScreenig($film, mixed $screening)
    {
       collect($screening)->each(function($data) use ($film){
           $film->screenings()->create($data);
       });
    }

    public function list()
    {
        return $this->film->paginate(15);
    }

    public function detail(string $slug)
    {
        return $this->film->with('screenings')->whereSlug($slug)->first();
    }


}
