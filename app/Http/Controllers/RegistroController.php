<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistroRequest;

class RegistroController extends Controller
{
    public function index(RegistroRequest $request)
    {
        $registrar = new Usuario();
        $registrar->nom = $request->get('nombre');
        $registrar->password = $request->get('password');
        $registrar->email = $request->get('email');
        $registrar->data_registro = date('Y-m-d H:i:s');
        $registrar->save();


        return redirect('/login')->with('success', 'Tu cuenta ha sido registrada.');
    }
}
