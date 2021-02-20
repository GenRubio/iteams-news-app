<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Noticia;

class VideosController extends Controller
{
    public function index(){
        $noticias = Noticia::orderBy('id', 'desc')
        ->where('video', 1)
        ->paginate(18);
        $categorias = Categoria::orderBy('id', 'asc')
        ->get();
        return view('home.videos', compact('noticias', 'categorias'));
    }
}
