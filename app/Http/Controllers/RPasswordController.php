<?php

namespace App\Http\Controllers;

use App\Mail\RecoverPassword;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SelectUserEmailRequest;
use App\Http\Requests\RecoverPasswordRequest;


class RPasswordController extends Controller
{
    public function index(){
        if (auth()->check()){
            return redirect('dashboard');
        }
        else{
            return view('recoverPassword');
        }
    }
    
    public function reciveEmail(SelectUserEmailRequest $request){
        $user = Usuario::where('email', $request->get('email'))->first();
        
        if ($user === null) {
            return back()
            ->withErrors(['email' => 'No se ha encontrado el email.'])
            ->withInput(request(['email']));
        }
        $user->token = md5(uniqid(mt_rand(), false));
        $user->active_token = 1;
        $user->save();

        $url = URL::current() . "?id=" . $user->id . "&token=" . $user->token;

        Mail::to(request('email'))
               ->send(new RecoverPassword($url));

        return back()->with('success', 'Codigo enviado. Revisa tu email.');
    }

    public function cambiarPassword(Request $request){
        $userId = $request->id;
        $token =  $request->token;

        if ($userId == null || $token == null){
            return redirect('login');
        } else {
            $usuario = Usuario::where('id', '=', $userId)
                              ->where('token',  '=', $token)
                              ->first();
            if ($usuario != null){
                if ($usuario->active_token == 1){
                    return view('recoverPasswordAut', compact('userId', 'token'));
                }
            }
            
            return redirect('login');
        }
    }

    public function cambiarPasswordSave(RecoverPasswordRequest $request){
        $userId = $request->userId;
        $token = $request->token;
        $newPassword = $request->password;

        $usuario = Usuario::where('id', '=', $userId)
                          ->where('token', '=', $token)
                          ->first();
        
        if ($usuario != null){
            if ($usuario->active_token == 1){
                $usuario->token = "";
                $usuario->active_token = 0;
                $usuario->password = $newPassword;
                $usuario->save();

                return redirect('/login')->with('success', 'La contraseña se ha modificado.');
            }
        }
        
        return redirect('login');
    }
}
