<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required',
            'nombreCategoriaInput' => 'required|unique:categorias,nombre'
        ];
    }
    public function messages()
    {
        return [
            'nombreCategoriaInput.required' => 'El nombre de la categoría es obligatorio',
            'nombreCategoriaInput.unique' => 'Se ha encontrado categoría con el mismo nombre.',
        ];
    }
}
