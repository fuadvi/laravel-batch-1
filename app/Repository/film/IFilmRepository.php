<?php

namespace App\Repository\film;

interface IFilmRepository
{
    public function add(array $data);
    public function list();
    public function detail(string $slug);

    public function addScreenig($film, mixed $screening);
}
