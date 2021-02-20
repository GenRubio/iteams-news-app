@if ($noticias->count() > 0)
    @foreach ($noticias as $noticia)
        <tr>
            <td>{{ $noticia->id }}</td>
            <td>{{ $noticia->titulo }}</td>
            <td>{{ $noticia->data }}</td>
            <td>
                <button id="{{ $noticia->id }}" _token="{{ csrf_token() }}" type="submit" class="btn btn-primary editarNoticia">
                    Editar
                </button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td align="center" colspan="5">
            No data
        </td>
    </tr>
@endif