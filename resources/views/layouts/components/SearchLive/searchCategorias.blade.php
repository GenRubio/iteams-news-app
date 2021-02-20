@if ($categorias->count() > 0)
    @foreach ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }} </td>
            <td>
                <input type="text" class="{{ $categoria->id }}" id="nombreCategoriaInput"
                    value="{{ $categoria->nombre }}">
            </td>
            <td>
                @php
                \App\Models\Noticia::where('categoria', $categoria->id)->count()
                @endphp
            </td>
            <td>
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <button id="{{ $categoria->id }}" type="submit" class="btn btn-primary updateCategoria">
                    Update
                </button>
            </td>
            <td>
                <button id="{{ $categoria->id }}" type="submit" class="btn btn-danger deleteCategoria">
                    Delete
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
