<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CinemasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "location" => $this->location,
            "film" => $this->whenLoaded('screeningFilm', function (){
               return $this->screeningFilm->map(fn($item) => [
                    "screening_id" => $item->id,
                    "film_id" => $item->film_id,
                    "show_time" => $item->show_time,
                    "ticket_price" => $item->ticket_price,
                    "film_name" => $item->film->title,
                ]);
            })
        ];
    }
}
