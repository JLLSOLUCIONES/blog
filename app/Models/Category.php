<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Habilita para poder almacenar en la base de datos los campos por asignacion masiba
    protected $fillable = ['name', 'slug'];

    // con esta funcion laravel ya no toma el id para mostrar la informacion de una categoria, tomara el slug que aparecera en la barra de navegacion
    public function getRouteKeyName()
    {
        return ('slug');
    }


    //Relacion uno a muchos

    Public function posts(){

        return $this->hasMany(Post::class);
    }

}
