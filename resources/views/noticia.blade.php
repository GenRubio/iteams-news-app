@extends('layouts.app')
@section('categorias')
    @foreach ($categorias as $categoria)
        <a class="dropdown-item" href="{{ url('categoria/' . $categoria->id) }}">{{ $categoria->nombre }}</a>
    @endforeach
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-10 col-lg-12 col-md-12">
            <div>
                <h1><strong>{!! $noticia->titulo !!}</strong></h1>
                <p>Publicado: {!! $noticia->data !!}</p>
            </div>
            <div>
                <h5 style="margin-bottom: 20px;"><strong>{!! $noticia->sub_titulo !!}</strong></h5>
            </div>
            @if ($noticia->imagen != '')
                @if (str_contains($noticia->imagen, 'youtube'))
                    <div style="margin-bottom: 20px;" class="card">
                        <div class="card-image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="100%" src="{{ $noticia->imagen }}" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @else
                    <img style="margin-bottom: 20px;" src="{{ $noticia->imagen }}" class="card-img-top">
                @endif
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
            <br>
            <hr>
            <h3>Comentarios: {{ $comentariosCount }}</h3>
            @if ($comentariosCount == 0)
                <h4 style="color:#c5c1c1;">Se el primero en opinar.</h4>
            @endif
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    {{ csrf_field() }}
                    <div id="post_data"></div>
                    <script>
                        $(document).ready(function() {
                            var _token = $('input[name="_token"]').val();

                            load_data('', _token);

                            function load_data(id = "", _token) {
                                $.ajax({
                                    url: "{{ route('loadmore.load_data', $noticia->id) }}",
                                    method: 'POST',
                                    data: {
                                        id: id,
                                        _token: _token,
                                        id_noticia: {{ $noticia->id }}
                                    },
                                    success: function(data) {
                                        $('#load_more_button').remove();
                                        $('#post_data').append(data.result);
                                    }
                                })
                            }
                            $(document).on('click', '#load_more_button', function() {
                                var id = $(this).data('id');
                                $('#load_more_button').html('<b>Cargando...</b>');
                                load_data(id, _token);
                            })
                        });

                    </script>
                </div>
            </div>
            <br>
            <hr>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <form action="{{ route('noticia.coment.publish') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="noticiaId" value="{{ $noticia->id }}">
                        @if (!auth()->user())
                            <input type="hidden" name="idUsuario" value="0">
                            <input type="hidden" name="usuarioAvatar" value="">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input name="nombre" type="text" class="form-control" id="nombre">
                                {!! $errors->first('nombre', '<span style="color:red" class="help-block">:message</span>')
                                !!}
                            </div>
                        @else
                            <input type="hidden" name="idUsuario" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="nombre" value="{{ auth()->user()->nom }}">
                            <input type="hidden" name="usuarioAvatar" value="{{ auth()->user()->img_perfil }}">
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comentario</label>
                            <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                            {!! $errors->first('comentario', '<span style="color:red" class="help-block">:message</span>')
                            !!}
                        </div>
                        <div
                            class="d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-sm-end justify-content-end">
                            <button name="publicarComentario" type="submit" class="btn btn-primary">Publicar</button>
                        </div>

                    </form>
                </div>
            </div>
            <br><br>
        </div>
        <div class="col-xl-2 d-none d-xl-block border-left">
            <h4><strong>Lo más popular</strong></h4>
            <div class="row">
                @foreach ($populars as $noticia)
                    <div class="col-12">
                        <a href="{{ url('noticia/' . $noticia->id) }}">
                            <p style="margin-bottom: 0px;" class=" text-muted card-text">
                                <strong style="color:black;">{{ $noticia->titulo }}</strong>
                            </p>
                        </a>
                        <p style="margin-bottom: 0px;color: grey;">{{ $noticia->data }}</p>
                        <p>Vistas: {{ $noticia->visitas }}</p>
                        <hr>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
