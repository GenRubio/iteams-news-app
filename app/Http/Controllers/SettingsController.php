<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChangePasswordRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    public function cambiarContraseña(ChangePasswordRequest $request){

        $newPassword = $request->password;

        $usuario = Usuario::find(auth()->user()->id);
        $usuario->password = $newPassword;
        $usuario->save();

        return response()->json([
            'result' => 'La contraseña se ha modificado',
        ], Response::HTTP_CREATED);        
    }
}
