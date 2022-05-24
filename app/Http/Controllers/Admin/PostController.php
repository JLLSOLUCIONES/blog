<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct()
    {
     $this->middleware('can:admin.posts.index')->only('index');
     $this->middleware('can:admin.posts.create')->only('create', 'store');
     $this->middleware('can:admin.posts.edit')->only('edit', 'update');
     $this->middleware('can:admin.posts.destroy')->only('destroy');
    }



    public function index()
    {
        return view('admin.posts.index');
    }

   
    public function create()
    {

        $categories = Category::pluck('name', 'id');
        $tags=Tag::all();
        
        //pruebas en linea
        //return $categories;

        return view('admin.posts.create', compact('categories', 'tags'));
    }

   
    public function store(PostRequest $request)
    {
       /*  return $request->file('file'); */
       /* Asi no funcionaba */
       /*  return Storage::put('posts', $request->file('file')); */
       /*  y asi, si */
       /*  return Storage::put('public/posts', $request->file('file'));  */

       //aqui se validaran las reglas creadas en el fichero StorePostRequest
      /*  return "Las validaciones pasaron con exito"; */ //un ejemplo de que asi ha sido.

       $post = Post::create($request->all());

       if ($request->file('file')) {

        $url = Storage::put('public/posts', $request->file('file'));

        $post->image()->create([
            'url' => $url
        ]);

       }
            
       //Cada vez que se añadan datos nuevos, se deben eliminar los datos en Cache
       Cache::flush('key');

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info_create', 'ok');
    }

  
    public function edit(Post $post)
    {
        //hacemos referencia a la policy.  con esto solo los usuarios que crearon el post podran editarlo
        $this->authorize('author', $post);
        
        $categories = Category::pluck('name', 'id');
        $tags=Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(PostRequest $request, Post $post)
    {

        //hacemos referencia a la policy.  con esto solo los usuarios que crearon el post podran editarlo
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('file')){

           $url =  Storage::put('public/posts',$request->file('file'));

           if($post->image){

                    Storage::delete($post->image->url);

                    $post->image->update([

                        'url' => $url
                    ]);
                }else{
                    $post->image()->create([
                        'url' => $url
                    ]);
           }
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

         //Cada vez que se añadan datos nuevos, se deben eliminar los datos en Cache
       Cache::flush('key');

        return redirect()->route('admin.posts.edit', $post)->with('info_update', 'ok');
    }


    public function destroy(Post $post)
    {
        
        //hacemos referencia a la policy. con esto solo los usuarios que crearon el post podran eliminarlo
        $this->authorize('author', $post);
        
        $post->delete();

         //Cada vez que se añadan datos nuevos, se deben eliminar los datos en Cache
       Cache::flush('key');

        return redirect()->route('admin.posts.index')->with('info', 'ok');
    }
}
