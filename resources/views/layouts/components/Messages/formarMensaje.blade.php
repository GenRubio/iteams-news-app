@foreach ($mensajes as $mensaje)
    <tr>
        <th style="color: #ff2d20;">{{ $mensaje->nombre }}</th>
        <th>{{ $mensaje->subject }}</th>
        <th>{{ $mensaje->created_at }}</th>
        <th>
            <button id="{{ $mensaje->id }}" _token="{{ csrf_token() }}" type="submit" name="verMensajeEmail"
                class="btn btn-primary verMensajeEmail">Mirar</button>
            <button id="{{ $mensaje->id }}" _token="{{ csrf_token() }}" type="submit" name="responderMensajeEmail"
                class="btn btn-success responderMensajeEmail">Responder</button>
            <button id="{{ $mensaje->id }}" _token="{{ csrf_token() }}" type="submit" name="eliminarMensajeEmail"
                class="btn btn-danger eliminarMensajeEmail">Eliminar</button>
        </th>
    </tr>
    <tr>
        <td colspan="4" style="background-color: #eeeeee;">
            <div id="mensajeVerNumero{{ $mensaje->id }}"></div>
        </td>
    </tr>
@endforeach
