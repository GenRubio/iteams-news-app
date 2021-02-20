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
    <h1><strong>Videos</strong></h1>
    <hr>
    <div class="row" id="resultadoNews">
        @foreach ($noticias as $noticia)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $noticia->id) }}">
                    <div class="iteams-noticia">
                        <div class="card">
                            <div class="card-image">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="100%" src="{{ $noticia->imagen }}" frameborder="0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-muted card-text mt-3"><strong style="color:black;">{{ $noticia->titulo }}</strong>
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
    </div>
    <br>
    {{ $noticias->links('pagination::bootstrap-4') }}
    <br>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
