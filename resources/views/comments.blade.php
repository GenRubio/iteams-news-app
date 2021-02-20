@foreach ($comentarios as $comentario)
    <div class="card">
        <div class="card-header">
            {{ $comentario->fecha }}
        </div>
        <div class="card-body">
            @if ($comentario->img_avatar != '')
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 border-right">
                        <img src="{{ $comentario->img_avatar }}" , height="73px" , width="58px">
                    </div>
                    <div class="col-10 col-xl-10 col-lg-10 col-md-10 col-sm-10">
                        @if ($comentario->color_id == 2)
                            <h5 class="card-title" style="color:gold;"><strong>{{ $comentario->nombre }}</strong></h5>
                        @elseif ($comentario->color_id == 1)
                            <h5 class="card-title" style="color:#ff2d20;"><strong>{{ $comentario->nombre }}</strong>
                            </h5>
                        @elseif ($comentario->color_id == 0)
                            <h5 class="card-title" style="color:#3490dc;"><strong>{{ $comentario->nombre }}</strong>
                            </h5>
                        @endif
                        <p>{{ $comentario->comentario }}</p>
                    </div>
                </div>
            @else
                @if ($comentario->color_id == 2)
                    <h5 class="card-title" style="color:gold;"><strong>{{ $comentario->nombre }}</strong></h5>
                @elseif ($comentario->color_id == 1)
                    <h5 class="card-title" style="color:#ff2d20;"><strong>{{ $comentario->nombre }}</strong></h5>
                @elseif ($comentario->color_id == 0)
                    <h5 class="card-title" style="color:#3490dc;"><strong>{{ $comentario->nombre }}</strong></h5>
                @endif
                <p>{{ $comentario->comentario }}</p>
            @endif
            @if (auth()->user())
                @if (auth()->user()->id == $comentario->id_usuario || auth()->user()->admin == 1)
                    <div class="row">
                        <form method="POST" action="{{ route('delete.notice.comment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="comentario_id" value="{{ $comentario->id }}">
                            <input type="hidden" name="noticia_id" value="{{ $comentario->id_noticia }}">
                            <input type="hidden" name="usuario_id" value="{{ $comentario->id_usuario }}">
                            <div class="d-flex">
                                <div class="p-2">
                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
    <br>
    @php
        $last_id = $comentario->id;
    @endphp
@endforeach
@php
$comentarios = \App\Models\ComentarioNoticia::where('id_noticia', '=', $noticia->id)
    ->orderBy('id', 'DESC')
    ->get();
$comentariosId = [];
foreach ($comentarios as $comentario) {
    array_push($comentariosId, $comentario->id);
}
@endphp
@if (in_array($last_id - 1, $comentariosId))
    <div class="d-flex bd-highlight">
        <div class="flex-fill bd-highlight">
            <div id="load_more">
                <button type="button" name="load_more_button" class="btn btn-primary" data-id="{{ $last_id }}"
                    id="load_more_button"><strong>Ver mas</strong>
                </button>
            </div>
        </div>
        <div class="flex-fill bd-highlight"></div>
    </div>
@endif
