<?php

namespace App\Service\Cinemas;

interface ICinemasService
{
    public function addCinemas(array $request);

    public function getListCinemas();
    public function getCinemas(int $id);
    public function editCinemas(array $request,int $id);
    public function deleteCinemas(int $id);
}
