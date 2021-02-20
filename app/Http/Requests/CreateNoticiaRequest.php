<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoticiaRequest extends FormRequest
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
        return [
            'titulo' => 'required|unique:noticias,titulo',
            'textoNoticia' => 'required',
            'importarImagen' => 'image|mimes:jpeg,jpg,png,gif'
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El titulo es obligatorio.',
            'titulo.unique' => 'Hay una noticia registrada con el mismo titulo.',
            'textoNoticia.required' => 'El texto de noticia es obligatorio.',
            'importarImagen.image' => 'El archivo debe ser una imagen.',
            'importarImagen.mimes' => 'Las extenciones permitidas son: jpeg,jpg,png,gif.',
        ];
    }
}
