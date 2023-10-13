<?php

namespace App\Service\Cinemas;

use App\Http\Resources\CinemasResource;
use App\Repository\Cinemas\ICinemasRepository;

class CinemasService implements ICinemasService
{
    public function __construct(
        public ICinemasRepository $cinemasRepo
    )
    {
    }


    public function addCinemas(array $request)
    {
        return $this->cinemasRepo->create($request);
    }

    public function getListCinemas()
    {
        $listCinemas = $this->cinemasRepo->listCinemas();

        // cek cinemas ada atau tidak
        if (empty($listCinemas)) return  [];

        // return maping data
        return CinemasResource::collection($listCinemas);
    }

    public function getCinemas(int $id)
    {
        $cinemas = $this->cinemasRepo->getCinemaById($id);
        return new CinemasResource($cinemas);
    }

    public function editCinemas(array $request, int $id)
    {
      $cinemas =  $this->cinemasRepo->getCinemaById($id);
      $this->cinemasRepo->update($request, $cinemas->id);
    }

    public function deleteCinemas(int $id)
    {
        $cinemas =  $this->cinemasRepo->getCinemaById($id);
        $this->cinemasRepo->delete($cinemas->id);
    }


}
