<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    //esto es para verificar si un usuario es propietario de un post
    public function Author(user $user, Post $post){
        if($user->id == $post->user->id){
            return true;
        }else{
            return false;
        }

    }
    //Esto es para verificar si un post tiene el estado publicado antes de que se publique. Asi evitamso que nos lo cambien en la url del navegador.
    public function published(?user $user, Post $post){
        if($post->status == 2){
            return true;
        }else{
            return false;
        }

    }

}
