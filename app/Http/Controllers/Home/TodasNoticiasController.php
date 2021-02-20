<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Noticia;

class TodasNoticiasController extends Controller
{
    public function index(){
        $noticias = Noticia::orderBy('id', 'desc')->paginate(18);
        $populars = Noticia::orderBy('visitas', 'DESC')->take(7)->get();
        $categorias = Categoria::orderBy('id', 'asc')->get();
        $destacados = Noticia::orderBy('id', 'desc')
        ->where('destacada', 1)->take(4)->get();
        return view('home.todas-las-noticias', compact('noticias', 'categorias', 'populars', 'destacados'));
    }
}
