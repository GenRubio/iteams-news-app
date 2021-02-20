<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contacto;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'desc')->take(18)->get();
        $populars = Noticia::orderBy('visitas', 'DESC')->take(7)->get();
        $categorias = Categoria::orderBy('id', 'asc')->get();
        $videos = Noticia::orderBy('id', 'desc')
        ->where('video', 1)
        ->take(6)
        ->get();
        $destacados = Noticia::orderBy('id', 'desc')
            ->where('destacada', 1)->take(4)->get();
        return view('home', compact('noticias', 'categorias', 'populars', 'destacados', 'videos'));
    }
    public function about()
    {
        $categorias = Categoria::orderBy('id', 'asc')->get();
        return view('about', compact('categorias'));
    }
    public function contacto()
    {
        $categorias = Categoria::orderBy('id', 'asc')->get();
        return view('contacto', compact('categorias'));
    }
    public function categorias($categoriaId)
    {
        $noticias = Noticia::where('categoria', '=', $categoriaId)
            ->orderBy('id', 'desc')
            ->paginate(18);
        $populars = Noticia::orderBy('visitas', 'DESC')
            ->take(7)
            ->get();
        $destacados = Noticia::orderBy('id', 'desc')
            ->where('destacada', 1)
            ->take(4)
            ->get();

        if (count($noticias) > 0) {
            $categorias = Categoria::orderBy('id', 'asc')->get();
            return view('home.todas-las-noticias', compact('noticias', 'categorias', 'populars', 'destacados'));
        } else {
            return redirect('/');
        }
    }
    public function enviarContacto(CreateContactRequest $request)
    {

        $contacto = new Contacto();
        $contacto->nombre = $request->nombreContacto;
        $contacto->email = $request->emailContacto;
        $contacto->subject = $request->correoAsuntoContacto;
        $contacto->message = $request->correoTextoContacto;
        $contacto->save();

        return response()->json([
            'result' => 'El formulario se ha enviado correctamente. Lo antes posible te responderemos via email.',
        ], Response::HTTP_CREATED);
    }
}
