@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div>
            <h1><strong>{!! $noticia->titulo !!}</strong></h1>
            <p>Publicado: {!! $noticia->data !!}</p>
        </div>
        <div>
            <h5><strong>{!! $noticia->sub_titulo !!}</strong></h5>
        </div>
        @if ($noticia->imagen != '')
            <div
                style="width:100%; height:600px; background-image:url('{{ $noticia->imagen }}'); background-repeat: no-repeat;">
            </div>
            <br><br>
        @endif
        <div>
            <p style="font-size: 17px">{!! $noticia->noticia !!}
            <p>
        </div>
        <ul class="nav mt-3">
            <li class="nav-item">
                <a class="nav-link active p-0" href="{{ route('home') }}">
                    <button class="btn btn-primary">
                        Volver
                    </button>
                </a>
            </li>
        </ul>
    </div>
    <br>
    <hr>
    <h3>Comentarios: {{ $comentarios->count() }}</h3>
    @if ($comentarios->count() == 0)
      <h4 style="color:#c5c1c1;">Se el primero en opinar.</h4>
    @endif
    @foreach ($comentarios as $comentario)
        <div class="d-flex bd-highlight">
            <div class="flex-fill bd-highlight">
                <div class="card">
                    <div class="card-header">
                        {{ $comentario->fecha }}
                    </div>
                    <div class="card-body">
                        @if ($comentario->img_avatar != '')
                            <div class="row">
                                <div class="col border-right">
                                    <img src="{{ $comentario->img_avatar }}",
                                    height="73px",
                                    width="58px">
                                </div>
                                <div class="col-10">
                                    @if ($comentario->color_id == 2)
                                        <h5 class="card-title" style="color:gold;">
                                            <strong>{{ $comentario->nombre }}</strong>
                                        </h5>
                                    @elseif ($comentario->color_id == 1)
                                        <h5 class="card-title" style="color:#ff2d20;">
                                            <strong>{{ $comentario->nombre }}</strong>
                                        </h5>
                                    @else
                                        <h5 class="card-title" style="color:#3490dc;">
                                            <strong>{{ $comentario->nombre }}</strong>
                                        </h5>
                                    @endif
                                    <p class="card-text">{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                        @else
                            @if ($comentario->color_id == 2)
                                <h5 class="card-title" style="color:gold;">
                                    <strong>{{ $comentario->nombre }}</strong>
                                </h5>
                            @elseif ($comentario->color_id == 1)
                                <h5 class="card-title" style="color:#ff2d20;">
                                    <strong>{{ $comentario->nombre }}</strong>
                                </h5>
                            @else
                                <h5 class="card-title" style="color:#3490dc;">
                                    <strong>{{ $comentario->nombre }}</strong>
                                </h5>
                            @endif
                            <p class="card-text">{{ $comentario->comentario }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex-fill bd-highlight"></div>
        </div>
        <br>
    @endforeach
    


    <hr>
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-fill bd-highlight">
            <form action="{{ route('noticia.coment.publish') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="noticiaId" value="{{ $noticia->id }}">
                @if (!auth()->user())
                    <input type="hidden" name="idUsuario" value="0">
                    <input type="hidden" name="usuarioAvatar" value="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre">
                        {!! $errors->first('nombre', '<span style="color:red" class="help-block">:message</span>') !!}
                    </div>
                @else
                    <input type="hidden" name="idUsuario" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="nombre" value="{{ auth()->user()->nom }}">
                    <input type="hidden" name="usuarioAvatar" value="{{ auth()->user()->img_perfil }}">
                @endif
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comentario</label>
                    <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    {!! $errors->first('comentario', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <button name="publicarComentario" type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
        <div class="p-2 flex-fill bd-highlight"></div>
    </div>
    <br><br>
@endsection
