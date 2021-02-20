<?php

namespace App\Http\Requests;

use App\Rules\ComprobarOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'passwordActual' => ['required', 'min:8', new ComprobarOldPassword()],
            'password' => 'required|min:6',
            'passwordRepeat' => 'required|min:8|required_with:password|same:password'
        ];
    }
    public function messages()
    {
        return [
            'passwordActual.required' => 'El campo contraseña actual es obligatorio',
            'passwordActual.min' => 'La contraseña actual es de minimo 8 digitos',

            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña es de minimo 8 digitos',

            'passwordRepeat.required' => 'El campo contraseña es obligatorio',
            'passwordRepeat.min' => 'La contraseña es de minimo 8 digitos',
            'passwordRepeat.same' => 'La contraseña no coincide',
        ];
    }
}
