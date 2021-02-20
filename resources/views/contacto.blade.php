@extends('layouts.app')
@section('categorias')
    @foreach ($categorias as $categoria)
        <a class="dropdown-item" href="{{ url('categoria/' . $categoria->id) }}">{{ $categoria->nombre }}</a>
    @endforeach
@endsection
@section('content')
    <div class="container">
        <div class="container text-center">
            <h1><strong style="color: #ff2d20;">iTeams News© Contacto</strong></h1>
        </div>
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                <form id="formularioContacto">
                    {{ csrf_field() }}
                    <div id="correoEnviado" class="alert alert-success"></div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input name="nombreContacto" type="text" class="form-control" id="nombre"
                                    placeholder="Nombre" required>
                                <span id="nombreContactoError" style="color:red" class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-8">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correoElectronico">Email address</label>
                        <input name="emailContacto" type="email" class="form-control" id="correoElectronico"
                            placeholder="name@example.com" required>
                        <span id="emailContactoError" style="color:red" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="correoAsunto">Asunto</label>
                        <input name="correoAsuntoContacto" type="text" class="form-control" id="correoAsunto"
                            placeholder="Asunto" required>
                        <span id="correoAsuntoContactoError" style="color:red" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="correoTexto">Area de texto</label>
                        <textarea name="correoTextoContacto" class="form-control" id="correoTexto" rows="4"
                            required></textarea>
                        <span id="correoTextoContactoError" style="color:red" class="help-block"></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
        </div>

    </div>

    <br><br><br>
    <hr>
    <script>
        $(document).ready(function() {
            $('#correoEnviado').fadeOut();
            $("#formularioContacto").on('submit', function(event) {
                event.preventDefault();
                $("#nombreContactoError").fadeOut();
                $("#emailContactoError").fadeOut();
                $("#correoAsuntoContactoError").fadeOut();
                $("#correoTextoContactoError").fadeOut();

                $.ajax({
                    url: "{{ route('home.contacto.enviar') }}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#correoEnviado").fadeIn();
                        $("#correoEnviado").text(data.result);
                        $("#formularioContacto")[0].reset();
                    },
                    error: function(error) {
                        $('#correoEnviado').fadeOut();
                        if (error.responseJSON.errors.nombreContacto) {
                            $("#nombreContactoError").text(error.responseJSON.errors
                                    .nombreContacto)
                                .fadeIn();
                        }
                        if (error.responseJSON.errors.emailContacto) {
                            $("#emailContactoError").text(error.responseJSON.errors
                                    .emailContacto)
                                .fadeIn();
                        }
                        if (error.responseJSON.errors.correoAsuntoContacto) {
                            $("#correoAsuntoContactoError").text(error.responseJSON.errors
                                    .correoAsuntoContacto)
                                .fadeIn();
                        }
                        if (error.responseJSON.errors.correoTextoContacto) {
                            $("#correoTextoContactoError").text(error.responseJSON.errors
                                    .correoTextoContacto)
                                .fadeIn();
                        }
                    }
                })
            });
        });

    </script>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
