<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\ComentarioNoticia;
use Illuminate\Http\Response;

class HomeNoticiaController extends Controller
{
    public function mirarNoticia(Noticia $noticia)
    {
        $noticia->increment('visitas');

        $comentariosCount = ComentarioNoticia::where('id_noticia', $noticia->id)->orderBy('id', 'desc')->count();
        $categorias = Categoria::orderBy('id', 'asc')->get();
        $populars = Noticia::orderBy('visitas', 'DESC')->take(7)->get();
        return view('noticia', compact('noticia', 'comentariosCount', 'categorias', 'populars'));
    }
    
    public function cargarMasCometarios(Request $request, Noticia $noticia)
    {
        if ($request->id > 0) {
            $comentarios = ComentarioNoticia::where('id', '<', $request->id)
                    ->where('id_noticia', '=', $request->id_noticia)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            
        } else {
            $comentarios = ComentarioNoticia::where('id_noticia', '=', $request->id_noticia)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }

        $content = "";
        if (!$comentarios->isEmpty()) {
            $content = view('comments', compact('comentarios', 'noticia'))->render();
            
        }
        return response()->json([
            'result' => $content,
        ], Response::HTTP_CREATED);   
    }
}
