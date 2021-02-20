<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImagePerfilRequest extends FormRequest
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
            'importarAvatar' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
    }
    public function messages(){
        return [
            'importarAvatar.required' => 'No has seleccionado una imagen',
            'importarAvatar.image' => 'El archivo seleccionado no es una imagen',
            'importarAvatar.mimes' => 'Las extenciones suportadas son jpeg,jpg,png,gif',
        ];
    }
}
