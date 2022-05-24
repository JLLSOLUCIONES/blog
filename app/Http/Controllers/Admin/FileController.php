<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\FileRequest;

class FileController extends Controller
{


    public function __construct()
    {
     $this->middleware('can:admin.files.index')->only('index');
     $this->middleware('can:admin.files.create')->only('create', 'store');
     $this->middleware('can:admin.files.edit')->only('edit', 'update');
     $this->middleware('can:admin.files.destroy')->only('destroy');
    }


    public function index()
    {
        
        $files = File::all();

        return view('admin.files.index', compact('files'));
    }


    public function create()
    {
        $num_files=file::count();
        
        if ($num_files<13) {
            return view('admin.files.create');
        } else {
            return redirect()->route('admin.files.index')->with('info_create', 'nok');
        }
         
    }


    public function store(FileRequest $request)
    {
        $file = $request->all();

        if($request->file('file')){
            $file['url'] = Storage::put('public/imagenes', $request->file('file'));
            File::create($file); 
        }

        return redirect()->route('admin.files.index')->with('info_store', 'ok');
    }

   
    public function edit(File $file)
    { 
        return view('admin.files.edit', compact('file'));
    }

  
    public function update(FileRequest $request, File $file)

    {
        $file->update($request->all());

        if ($request->file('file')){
           $url = Storage::put('public/imagenes', $request->file('file'));

           if ($file['url']){
                Storage::delete($file['url']);

                $file->update([
                    'url' => $url

                ]);
           }else{
                $file->create([
                    'url' => $url
                ]);

           }
        }

        return redirect()->route('admin.files.edit',$file)->with('info_update', 'ok');
    }

  
    public function destroy(File $file)
    {
       $file->delete();

       if ($file['url']){
        Storage::delete($file['url']);
       }


       return redirect()->route('admin.files.index')->with('eliminar', 'ok');

    }
}
