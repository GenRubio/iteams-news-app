<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
        // Esto te va a devolver un 422, en el ajax lo tienes que tratar como un error y no como un success
        return [
            'nombreCategoria' => 'required|unique:categorias,nombre' // el name del input tiene estas reglas. Debe ser obligatorio y único en la tabla de cateogiras
        ];
    }

    public function messages()
    {
        return [
            'nombreCategoria.required' => 'El nombre de la categoría es obligatorio',
            'nombreCategoria.unique' => 'Se ha encontrado categoría con el mismo nombre.',
        ];
    }
}