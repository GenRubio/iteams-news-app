@extends('layouts.app')
@section('categorias')
    @foreach ($categorias as $categoria)
        <a class="dropdown-item" href="{{ url('categoria/' . $categoria->id) }}">{{ $categoria->nombre }}</a>
    @endforeach
@endsection
@section('personal-styles')
    <style>
        .iteams-noticia:hover {
            transform: translateY(-2px);
        }

    </style>
@endsection
@section('content')
    <div class="container text-center">
        <h1><strong style="color: #ff2d20;">iTeams News©</strong></h1>
    </div>
    <br>
    <div class="row p-0">
        <div class="col-xl-10 col-lg-12 col-md-12">
            <div class="form-group">
                <input name="buscarNoticia" type="text" class="form-control" id="buscarNoticia"
                    placeholder="Buscador de noticias...">
            </div>
            <h1><strong>Noticias</strong></h1>
            <hr>
            <div class="row" id="resultadoNews">
                @foreach ($noticias as $noticia)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $noticia->id) }}">
                            <div class="iteams-noticia">
                                @if (str_contains($noticia->imagen, 'youtube'))
                                    <div class="card">
                                        <div class="card-image">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="100%" src="{{ $noticia->imagen }}" frameborder="0"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ $noticia->imagen }}" class="card-img-top">
                                @endif
                                <h5 class="text-muted card-text mt-3"><strong
                                        style="color:black;">{{ $noticia->titulo }}</strong>
                                </h5>
                                <div class="row" style="color: #a5a5a6;">
                                    <div class="col-9">
                                        <p>{{ $noticia->data }}</p>
                                    </div>
                                    <div class="col">
                                        <p><i class="far fa-eye"></i> {{ $noticia->visitas }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <script>
                    $(document).ready(function() {
                        function buscar_noticias_home(query = '_token:34d1230132d|@rim3d2323d', categoria) {
                            $.ajax({
                                url: "{{ route('home.serch.news') }}",
                                method: 'GET',
                                data: {
                                    query: query,
                                    categoria: categoria
                                },
                                dataType: 'json',
                                success: function(data) {
                                    $('#resultadoNews').html(data.result);
                                }
                            })
                        }
                        $(document).on('keyup', '#buscarNoticia', function() {
                            let query = $(this).val();
                            if (query == "") {
                                query = '_token:34d1230132d|@rim3d2323d';
                            }
                            let ruta = window.location.href;
                            let categoria = "false";
                            if (ruta.includes('categoria')) {
                                let array = ruta.split("/");
                                categoria = array[4];
                            }
                            buscar_noticias_home(query, categoria);
                        })
                    });

                </script>
            </div>
            <br>
            {{ $noticias->links('pagination::bootstrap-4') }}
            <br>
        </div>
        <div class="col-xl-2 d-none d-xl-block border-left">
            <h4><strong>Lo más popular</strong></h4>
            <div class="row">
                @foreach ($populars as $noticia)
                    <div class="col-12">
                        <a href="{{ url('noticia/' . $noticia->id) }}">
                            <p style="margin-bottom: 0px;" class="text-muted card-text">
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
