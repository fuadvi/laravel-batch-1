<?php

namespace App\Service\film;

use App\Dtos\FilmRequestDto;
use App\Http\Resources\FilmResource;
use App\Http\Resources\ListFilmResource;
use App\Repository\film\IFilmRepository;

class FIlmService implements IFilmService
{
    public function __construct(
        protected  IFilmRepository $filmRepo
    )
    {
    }


    public function addFilm($request)
    {
        $data = $request->all();

//        // simpan name image yang di upload dan pindahkan kedalam store
//        $data['thumbnail_url'] = $request->file("thumbnail_url")->store(
//            "film/image",
//            "public"
//        );

        // simpan data film nya ke database
       $film = $this->filmRepo->add((array)FilmRequestDto::FromRequest($data));
       $this->filmRepo->addScreenig($film, $data['screening']);
    }

    public function getListFilm()
    {
        $films = $this->filmRepo->list();
        return ListFilmResource::collection($films);
    }

    public function getFilm(string $slug)
    {
       $film = $this->filmRepo->detail($slug);

       return new FilmResource($film);
    }


}
