<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //Habilitamos la asignacion masiva

    protected $fillable = ['url'];

    //Relacion polimorfica

    public function imageable(){
        return $this->morphTo();
    }
}
