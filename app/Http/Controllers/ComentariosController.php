<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentarioNoticia;
use App\Http\Requests\PostCommentRequest;
use Carbon\Carbon;

class ComentariosController extends Controller
{
    public function comentarNoticia(PostCommentRequest $request){
        $comentario = new ComentarioNoticia();
        $comentario->id_noticia = $request->get('noticiaId');
        $comentario->id_usuario = $request->get('idUsuario');
        $comentario->nombre = $request->get('nombre');
        $comentario->img_avatar = $request->get('usuarioAvatar');

        // if (auth()->user() && auth()->user()->admin == 1){
            //auth()->user() && auth()->user()->isAdmin()
        if (auth()->user() && auth()->user()->admin == 1){
            $comentario->color_id = ComentarioNoticia::COLOR_ADMIN;
        }
        else if (auth()->user()){
            $comentario->color_id = ComentarioNoticia::COLOR_USER;
        }
        else{
            $comentario->color_id = ComentarioNoticia::COLOR_GUEST;
        }
        $comentario->comentario = $request->get('comentario');
        //$comentario->fecha = Carbon::now();  En formato Y-m-d H:i:s  En la base de datos tendria un campo datetime. in el el front haria $comentario->fecha->format('F j, Y, g:i a')
        $comentario->fecha = date("F j, Y, g:i a");
        $comentario->save();

        return back();
    }
    public function eliminarComentario(Request $request){
        $usuarioId = $request->usuario_id;
        $noticiaId = $request->noticia_id;
        $comentarioId = $request->comentario_id;
        if (auth()->user()) {
            if (auth()->user()->id == $usuarioId || auth()->user()->admin == 1) {
                ComentarioNoticia::where('id_usuario', $usuarioId)
                ->where('id_noticia', $noticiaId)
                ->where('id', $comentarioId)
                ->delete();
            }
        }
        return back();
    }
}
