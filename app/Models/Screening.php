<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function cinemas()
    {
        return $this->belongsTo(Cinema::class,'id','cinemas_id');
    }
}
