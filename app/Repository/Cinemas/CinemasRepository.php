<?php

namespace App\Repository\Cinemas;

use App\Models\Cinema;

class CinemasRepository implements ICinemasRepository
{
    public function __construct(
        public Cinema $cinema
    )
    {
    }


    public function create(array $data)
    {
        $this->cinema->create($data);
    }

    public function listCinemas()
    {
       return $this->cinema
           ->when(request()->get('search'), function ($query, $search){
               $query->where('name', "like","%".$search."%")
               ->orWhere('location',"like","%".$search."%");
           })
           ->paginate(10);
    }

    public function getCinemaById(int $id)
    {
        return $this->cinema->with('screeningFilm.film')->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
       $this->cinema->findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        $this->cinema->findOrFail($id)->delete();
    }


}
