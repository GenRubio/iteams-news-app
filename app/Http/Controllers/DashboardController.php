<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImagePerfilRequest;


class DashboardController extends Controller
{
    public function index()
    {
        $logs = Log::all()->sortByDesc('id')->take(10);
        $categorias = Categoria::orderBy('id', 'asc')->get();
        return view('dashboard', compact('logs', 'categorias'));
    }

    public function uploadImage(UploadImagePerfilRequest $request)
    {
        $image = $request->file('importarAvatar');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("avatar_images"), $new_name);

        $usuario = Usuario::find(auth()->user()->id);
        $usuario->img_perfil = '../avatar_images/' . $new_name;
        $usuario->save();

        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
