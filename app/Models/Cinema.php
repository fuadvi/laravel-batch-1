<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function screeningFilm()
    {
        return $this->hasMany(Screening::class,'cinemas_id','id');
    }
}
