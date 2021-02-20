<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CreateNoticiaRequest;
use App\Http\Requests\EditNoticiaRequest;
use App\Models\Noticia;
use App\Models\Categoria;
use SebastianBergmann\CodeUnit\NoTraitException;

class NoticiasController extends Controller
{
    public function crearNoticia(CreateNoticiaRequest $request)
    {
        $this->authorize('admin');

        $categoria = $request->get('categoria');
        $video = $request->get('video');

        $noticia = new Noticia();
        $noticia->titulo = str_replace("'", '"', $request->get('titulo'));
        $noticia->sub_titulo = str_replace("'", '"', $request->get('subtitulo'));
        $noticia->noticia = nl2br(str_replace("'", '"', $request->get('textoNoticia')));

        if ($categoria != "") {
            $categoriasTable = Categoria::where('id', '=', $categoria)->first();
            $noticia->categoria = $categoriasTable->id;
        } else {
            $noticia->categoria = 0;
        }
        $noticia->data = date("F j, Y, g:i a");
        if ($request->hasFile('importarImagen')) {

            $image = $request->file('importarImagen');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("images"), $new_name);
            $noticia->imagen = '../images/' . $new_name;
        } else {
            if ($video != ""){
                $video = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $video);
                $noticia->video = 1;
                $noticia->imagen = $video;
            }
            else{
                $noticia->imagen = '';
            }
        }
        $noticia->save();

        return response()->json([
            'result' => 'Se ha creado nueva noticia.',
        ], Response::HTTP_CREATED);      
    }
    public function editarNoticia(EditNoticiaRequest $request){
        $this->authorize('admin');

        $categoria = $request->get('categoria');
        $idNoticia = $request->get('idNoticia');

        $noticiaError = Noticia::where('titulo', '=', str_replace("'", '"', $request->get('tituloEdit')))
                                ->where('id', '!=', $idNoticia)
                                ->first();
        if ($noticiaError != null){
            return response()->json([
                'result' => 'Error. Hay una noticia con el mismo titulo.',
            ], Response::HTTP_CREATED);  
        }




        $noticia = Noticia::where('id', $idNoticia)->first();
        $noticia->titulo = str_replace("'", '"', $request->get('tituloEdit'));
        $noticia->sub_titulo = str_replace("'", '"', $request->get('subtituloEdit'));
        $noticia->noticia = nl2br(str_replace("'", '"', $request->get('textoNoticiaEdit')));
        if ($categoria != "") {
            $categoriasTable = Categoria::where('id', '=', $categoria)->first();
            $noticia->categoria = $categoriasTable->id;
        }
        $noticia->data = date("F j, Y, g:i a");
        if ($request->hasFile('importarImagenEdit')) {

            $image = $request->file('importarImagenEdit');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("images"), $new_name);
            $noticia->imagen = '../images/' . $new_name;
        }
        $noticia->update();

        return response()->json([
            'result' => 'Se ha actualizado la noticia.',
        ], Response::HTTP_CREATED);      
    }
    public function obtenerNoticiaEditar(Noticia $noticia){

        $categorias = Categoria::all();
        $result = "";
        $result = view('layouts.components.NoticiasPanel.LayoutNoticia.noticia', compact('noticia', 'categorias'))->render();
        
        return response()->json([
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function eliminarNoticia(Noticia $noticia){
        $this->authorize('admin');
        
        $noticia->delete();
    }
}
