<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //ponemos el valor a true porque el tema de autorizaciones lo vamos a trabajar con un paquete llamado Laravel permisos.
        
        return true;

        //pero si vamos a utilizar esta funcion para que no nos cambien el id del usuario registrado en el envio de un post, mediante el comando inspeccionar
    
        /* if($this->user_id == auth()->user()->id){
            return true;
        }else{
            return false;
        } */


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($post){

            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
