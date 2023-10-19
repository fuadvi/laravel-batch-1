<?php

namespace App\Service\film;

interface IFilmService
{
    public function addFilm($request);
    public function getListFilm();
    public function getFilm(string $slug);
}
