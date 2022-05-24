<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Imagecke;

class ImageckeController extends Controller
{
    public function upload(Request $request){
        
       $path = Storage::disk('public')->put('imagescke', $request->file('upload'));
        
        Imagecke::create([ 
            'path' => $path]);
    
        return response()->json([
            'url'=> "/storage/" . $path
        ]);
    }
}
