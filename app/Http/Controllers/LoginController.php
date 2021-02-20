<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        if (auth()->check()){
            return redirect('dashboard');
        }
        else{
            return view('login');
        }
    }
    public function authenticate(LoginRequest $request)
    {     
        $credentials = ['nom' => $request->get('nombre'), 'password' => $request->get('password')];

        if (Auth::attempt($credentials, true)){
            $this->addLog();
            return redirect()->intended('/dashboard');
        }
        else{
            return back()
            ->withErrors(['nombre' => 'Nombre de usuario o contraseña incorrectos.'])
            ->withInput(request(['nombre']));
        }
    }
    public function addLog(){
        $log = new Log();
        $log->nombre = auth()->user()->nom;
        $log->fecha = date("F j, Y, g:i a");
        $log->save();
        return back();
    }
}
