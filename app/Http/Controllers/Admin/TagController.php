<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{


    public function __construct()
    {
     $this->middleware('can:admin.tags.index')->only('index');
     $this->middleware('can:admin.tags.create')->only('create', 'store');
     $this->middleware('can:admin.tags.edit')->only('edit', 'update');
     $this->middleware('can:admin.tags.destroy')->only('destroy');
    }


   
    public function index()
    {
        $tags=Tag::all();

       return view('admin.tags.index', compact('tags'));
    }

   
    public function create()
    {
        $colors=[
            'yellow'=>'color amarillo',
            'green'=>'color verde',
            'blue'=>'color azul',
            'indigo'=>'color indigo',
            'purple'=>'color morado',
            'pink'=>'color rosado',
            'red'=>'color rojo',
            'gray'=>'color gray',
            'zinc'=>'color zinc',
            'neutral'=>'color neutral',
            'stone'=>'color stone',
            'orange'=>'color orange',
            'amber'=>'color amber',
            'lime'=>'color lime',
            'esmerald'=>'color esmerald',
            'teal'=>'color teal',
        ]; 
        return view('admin.tags.create', compact('colors'));
    }

   
    public function store(Request $request)
    {

        //definimos reglas de validacion

        $request->validate([
            'name' => 'required',
            //requerido en la tabla tag
            'slug' => 'required|unique:tags',
            'color' => 'required'
    ]);
    
    $tags = Tag::create($request->all());

    return redirect()->route('admin.tags.edit', $tags)->with('info_create', 'ok');;
    }

   
    public function edit(Tag $tag)
    {
        $colors=[
            'yellow'=>'color amarillo',
            'green'=>'color verde',
            'blue'=>'color azul',
            'indigo'=>'color indigo',
            'purple'=>'color morado',
            'pink'=>'color rosado',
            'red'=>'color rojo',
            'gray'=>'color gray',
            'zinc'=>'color zinc',
            'neutral'=>'color neutral',
            'stone'=>'color stone',
            'orange'=>'color orange',
            'amber'=>'color amber',
            'lime'=>'color lime',
            'esmerald'=>'color esmerald',
            'teal'=>'color teal',
        ]; 
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    
    public function update(Request $request, Tag $tag)
    {
         //definimos reglas de validacion

         $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info_update', 'ok');

    }

    
    public function destroy(Tag $tag)
    {
        $tag->delete();

         //Cada vez que se añadan datos nuevos, se deben eliminar los datos en Cache
       Cache::flush('key');

        return redirect()->route('admin.tags.index')->with('info', 'ok');
    }
}
