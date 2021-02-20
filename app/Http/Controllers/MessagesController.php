<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Http\Response;
use App\Http\Requests\SendTeamsEmailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailTeams;

class MessagesController extends Controller
{
    public function index(){

        $mensajes = Contacto::where('visible', 1)
        ->orderBy('id', 'DESC')
        ->get();

        $result = "";
        $result = view('layouts.components.Messages.formarMensaje', compact('mensajes'))->render();
        
        return response()->json([
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function delete(Contacto $contacto){
        $contacto->visible = 0;
        $contacto->save();
    }
    public function view(Contacto $contacto){
        $result = "";
        $result = view('layouts.components.Messages.verMensaje', compact('contacto'))->render();
        
        return response()->json([
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function responder(Contacto $contacto){
        $result = "";
        $result = view('layouts.components.Messages.responderMensaje', compact('contacto'))->render();
        
        return response()->json([
            'result' => $result,
        ], Response::HTTP_CREATED); 
    }
    public function send(SendTeamsEmailRequest $request){
        $subject = $request->correoAsuntoContactoTeams;
        $message = $request->correoTextoContactoTeams;

        Mail::to(request('emailContactoTeams'))
            ->send(new SendEmailTeams($subject, $message));

        return response()->json([
            'result' => "Email se ha enviado correctamente.",
        ], Response::HTTP_CREATED); 
    }
}
