<?php

namespace App\Repository\Cinemas;

interface ICinemasRepository
{
    public function create(array $data);

    public function listCinemas();
    public function getCinemaById(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);
}
