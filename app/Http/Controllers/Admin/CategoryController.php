<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
   {
    $this->middleware('can:admin.categories.index')->only('index');
    $this->middleware('can:admin.categories.create')->only('create', 'store');
    $this->middleware('can:admin.categories.edit')->only('edit', 'update');
    $this->middleware('can:admin.categories.destroy')->only('destroy');
   }


    public function index()
    {

        $categories=Category::all();

       return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        //definimos reglas de validacion

        $request->validate([
            'name' => 'required',
            //requerido en la tabla categories
            'slug' => 'required|unique:categories'


        ]);
        
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info_create', 'ok');;
    }


    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

  
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            //requerido en la tabla categories y con esto:slug,$category->id le decimos que ignore el slug de a categoria que queremos actualizar
            'slug' => "required|unique:categories,slug,$category->id"
        ]);

        //asi le pasamos lo que hemos escrito en el formulario
        $category->update($request->all());

        //nos redirecciona a la ruta admin.categories.edit añadinendo la informacion de la categoria
        return redirect()->route('admin.categories.edit', $category)->with('info_update', 'ok');
    }

    public function destroy(Category $category)
    {
       

        $category->delete();

        Cache::flush('key');

        return redirect()->route('admin.categories.index')->with('info', 'ok');
    }
}
