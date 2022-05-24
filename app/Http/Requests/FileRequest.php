<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $file = $this->route()->parameter('file');

        $rules = [
            'link' => 'required',
            'file' => 'image|required'
        ];

         if($file){

            $rules['file'] = 'image';
        } 

        /* if($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        } */

        return $rules;
    }
}
