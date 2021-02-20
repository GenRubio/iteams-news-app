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
            <div class="row p-0">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    @if (count($noticias) > 0)
                        <a class="lightbox" style="text-decoration: none;"
                            href="{{ url('noticia/' . $noticias[0]->id) }}">
                            <div class="iteams-noticia">
                                @if (str_contains($noticias[0]->imagen, 'youtube'))
                                    <div class="card">
                                        <div class="card-image">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="100%" src="{{ $noticias[0]->imagen }}" frameborder="0"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ $noticias[0]->imagen }}" class="card-img-top">
                                @endif
                                <h5 class=" text-muted card-text mt-3 mt-3"><strong
                                        style="color:black;">{{ $noticias[0]->titulo }}</strong>
                                </h5>
                                <div class="row" style="color: #a5a5a6;">
                                    <div class="col-9">
                                        <p>{{ $noticias[0]->data }}</p>
                                    </div>
                                    <div class="col">
                                        <p><i class="far fa-eye"></i> {{ $noticias[0]->visitas }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-3 col-md-6">
                            @if (count($noticias) > 1)
                                <a class="lightbox" style="text-decoration: none;"
                                    href="{{ url('noticia/' . $noticias[1]->id) }}">
                                    <div class="iteams-noticia">
                                        @if (str_contains($noticias[1]->imagen, 'youtube'))
                                            <div class="card">
                                                <div class="card-image">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $noticias[1]->imagen }}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ $noticias[1]->imagen }}" class="card-img-top">
                                        @endif
                                        <h5 class=" text-muted card-text mt-3"><strong
                                                style="color:black;">{{ $noticias[1]->titulo }}</strong>
                                        </h5>
                                        <div class="row" style="color: #a5a5a6;">
                                            <div class="col-8">
                                                <p>{{ $noticias[1]->data }}</p>
                                            </div>
                                            <div class="col">
                                                <p><i class="far fa-eye"></i> {{ $noticias[1]->visitas }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-xl-6 col-lg-3 col-md-6">
                            @if (count($noticias) > 2)
                                <a class="lightbox" style="text-decoration: none;"
                                    href="{{ url('noticia/' . $noticias[2]->id) }}">
                                    <div class="iteams-noticia">
                                        @if (str_contains($noticias[2]->imagen, 'youtube'))
                                            <div class="card">
                                                <div class="card-image">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $noticias[2]->imagen }}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ $noticias[2]->imagen }}" class="card-img-top">
                                        @endif
                                        <br>
                                        <h5 class=" text-muted card-text mt-3"><strong
                                                style="color:black;">{{ $noticias[0]->titulo }}</strong>
                                        </h5>
                                        <div class="row" style="color: #a5a5a6;">
                                            <div class="col-8">
                                                <p>{{ $noticias[2]->data }}</p>
                                            </div>
                                            <div class="col">
                                                <p><i class="far fa-eye"></i> {{ $noticias[2]->visitas }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-xl-6 col-lg-3 col-md-6">
                            @if (count($noticias) > 3)
                                <a class="lightbox" style="text-decoration: none;"
                                    href="{{ url('noticia/' . $noticias[3]->id) }}">
                                    <div class="iteams-noticia">
                                        @if (str_contains($noticias[3]->imagen, 'youtube'))
                                            <div class="card">
                                                <div class="card-image">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $noticias[3]->imagen }}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ $noticias[3]->imagen }}" class="card-img-top">
                                        @endif
                                        <br>
                                        <h5 class=" text-muted card-text mt-3"><strong
                                                style="color:black;">{{ $noticias[3]->titulo }}</strong>
                                        </h5>
                                        <div class="row" style="color: #a5a5a6;">
                                            <div class="col-8">
                                                <p>{{ $noticias[3]->data }}</p>
                                            </div>
                                            <div class="col">
                                                <p><i class="far fa-eye"></i> {{ $noticias[3]->visitas }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-xl-6 col-lg-3 col-md-6">
                            @if (count($noticias) > 4)
                                <a class="lightbox" style="text-decoration: none;"
                                    href="{{ url('noticia/' . $noticias[4]->id) }}">
                                    <div class="iteams-noticia">
                                        @if (str_contains($noticias[4]->imagen, 'youtube'))
                                            <div class="card">
                                                <div class="card-image">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $noticias[4]->imagen }}"
                                                            frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ $noticias[4]->imagen }}" class="card-img-top">
                                        @endif
                                        <br>
                                        <h5 class=" text-muted card-text mt-3"><strong
                                                style="color:black;">{{ $noticias[4]->titulo }}</strong>
                                        </h5>
                                        <div class="row" style="color: #a5a5a6;">
                                            <div class="col-8">
                                                <p>{{ $noticias[4]->data }}</p>
                                            </div>
                                            <div class="col">
                                                <p><i class="far fa-eye"></i> {{ $noticias[4]->visitas }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr class="d-none d-lg-block">
            <div class="col-xl-12 col-lg-12 p-0">
                @if (count($noticias) > 5)
                    <div class="row">
                        @foreach ($noticias as $key => $noticia)
                            @if ($key > 5)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <a class="lightbox" style="text-decoration: none;"
                                        href="{{ url('noticia/' . $noticia->id) }}">
                                        <div class="iteams-noticia">
                                            @if (str_contains($noticia->imagen, 'youtube'))
                                                <div class="card-image">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $noticia->imagen }}" frameborder="0"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="{{ $noticia->imagen }}" class="card-img-top">
                                            @endif
                                            <h5 class=" text-muted card-text mt-3"><strong
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
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
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
                        <p><i class="far fa-eye"></i> {{ $noticia->visitas }}</p>
                        <hr>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    <br><br>
@endsection
@section('second-content')
    <div class="container-fluid bg-dark">
        <div class="container">
            <br><br>
            <h1><strong style="color: white">Videos</strong></h1>
            <div class="row">
                <div class="col-lx-6 col-lg-6 col-md-12  col-sm-12">
                    @if (count($videos) > 0)
                        <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $videos[0]->id) }}">
                            <div class="iteams-noticia">
                                <div class="card bg-blak"
                                    style="background-color: #343a40 !important; border: none !important">
                                    <div class="card-image">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="100%" src="{{ $videos[0]->imagen }}" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <h5 class=" text-muted card-text mt-3"><strong
                                            style="color:white;">{{ $videos[0]->titulo }}</strong>
                                    </h5>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-lx-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach ($videos as $key => $video)
                            @if ($key > 1)
                                <div class="col-lx-6 col-lg-6 col-md-6  col-sm-12">
                                    <a class="lightbox" style="text-decoration: none;"
                                        href="{{ url('noticia/' . $video->id) }}">
                                        <div class="iteams-noticia">
                                            <div class="card bg-blak  mb-3"
                                                style="background-color: #343a40 !important; border: none !important">
                                                <div class="card-image" style="background-color: #343a40">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="100%" src="{{ $video->imagen }}" frameborder="0"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <h5 class=" text-muted card-text mt-3"><strong
                                                        style="color:white;">{{ $video->titulo }}</strong>
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <br>
    <div class="container">
        <h1><strong>Destacados</strong></h1>
        <div class="row">
            @foreach ($destacados as $noticia)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $noticia->id) }}">
                        <div class="iteams-noticia">
                            <img src="{{ $noticia->imagen }}" class="card-img-top">
                            <br>
                            <h5 class=" text-muted card-text mt-3"><strong
                                    style="color:black;">{{ $noticia->titulo }}</strong>
                            </h5>
                            <div class="row" style="color: #a5a5a6;">
                                <div class="col-8">
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
        <br>
    </div>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
