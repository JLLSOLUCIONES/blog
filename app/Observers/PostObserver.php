<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */

     //este se ejecutaria despues de crear
    public function created(Post $post)
    {
        //
    }

     //Este evento se ejecutara antes de que se cree el post. Cada vez que se cre un post se asignara al id del usuario el id del usuario identificado
     public function creating(Post $post)
     {
         // si estoy ejecutando comandos desde la consola esta asignacion no se ejecutara y se ejecutara la del seeder.
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
        
     }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }


    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    //Este evento se ejecutara despues de que se elimine el post
    public function deleted(Post $post)
    {
        //
    }

    //Este evento se ejecutara antes de que se elimine el post
    public function deleting(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image->url);

        }
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
