<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Categoria;
use App\Models\Noticia;
use App\Rules\ComprobarOldPassword;
use GrahamCampbell\ResultType\Result;

class SearchLiveController extends Controller
{
    public function buscadorNoticiasEditar(Request $request){
        $query = $request->get('query');
        $noticias = Noticia::findByTitle($query)->get();

        $total_row = $noticias->count();
        $result = "";
        $result = view('layouts.components.SearchLive.searchNoticiasEdit', compact('noticias'))->render();
        
        return response()->json([
            'count' => $total_row,
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function buscadorCategorias(Request $request){
        $query = $request->get('query');
        $categorias = Categoria::where('nombre', 'like',  '%' . $query . '%')->get();

        $total_row = $categorias->count();
        $result = "";
        $result = view('layouts.components.SearchLive.searchCategorias', compact('categorias'))->render();
      
        return response()->json([
            'count' => $total_row,
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function buscadorNoticias(Request $request){
        $query = $request->get('query');
        $categoria = $request->get('categoria');

        if ($categoria == "false"){
            $noticias = Noticia::findByTitle($query)->get();
        }
        else{
            $noticias = Noticia::findByTitle($query)
            ->where('categoria', $categoria)
            ->get();
        }
        

        $total_row = $noticias->count();
        $result = "";
        $result = view('layouts.components.SearchLive.searchNoticias', compact('noticias', 'categoria'))->render();
 
        return response()->json([
            'result' => $result,
        ], Response::HTTP_CREATED);
    }
    public function buscadorNoticiasEliminar(Request $request){
        $query = $request->get('query');
        $noticias = Noticia::findByTitle($query)->get();

        $total_row = $noticias->count();
        $result = "";
        $result = view('layouts.components.SearchLive.searchNoticiasDelete', compact('noticias'))->render();
        
        return response()->json([
            'count' => $total_row,
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
}
