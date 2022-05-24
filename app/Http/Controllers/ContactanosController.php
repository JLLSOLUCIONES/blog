<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    //este metodo se encarga de mostrar el formulario
    public function index(){
        return view('contactanos.index');
    }
   //este metodo se encarga de procesar el formulario y enviar el correo electronico
    public function store(Request $request){

        $request->validate([
            'firstname' => 'required',
            'mail' => 'email|required',
            'message' => 'required',
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('infojavierl2@gmail.com')->send($correo);
    
        return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado');
    }
}
