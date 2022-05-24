<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

     // con esta funcion laravel ya no toma el id para mostrar la informacion de una etiqueta, tomara el slug que aparecera en la barra de navegacion
     public function getRouteKeyName()
     {
         return ('slug');
     }

    //Realizon muchos a muchos
    public function posts(){
        return $this->BelongsToMany(Post::class);
    } 
}
