@if ($noticias->count() > 0)
    @foreach ($noticias as $noticia)
        <div class="col-md-6 col-lg-4">
            <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $noticia->id) }}">
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
                <br>
                <h5 class="text-muted card-text"><strong style="color:black;">{{ $noticia->titulo }}</strong></h5>
                <div class="row" style="color: #a5a5a6;">
                    <div class="col-8">
                        <p>{{ $noticia->data }}</p>
                    </div>
                    <div class="col">
                        <p>Vistas: {{ $noticia->visitas }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    @php
        if ($categoria == "false")
        {
            $noticias = \App\Models\Noticia::orderBy('id', 'desc')
            ->limit(18)
            ->get();
        }
        else{
            $noticias = \App\Models\Noticia::orderBy('id', 'desc')
            ->where('categoria', $categoria)
            ->limit(18)
            ->get();
        }
    @endphp
    @foreach ($noticias as $noticia)
        <div class="col-xl-4 col-lg-4 col-md-6">
            <a class="lightbox" style="text-decoration: none;" href="{{ url('noticia/' . $noticia->id) }}">
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
    @endforeach
@endif
