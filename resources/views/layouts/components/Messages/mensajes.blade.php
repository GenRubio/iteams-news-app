@if (auth()->user()->admin == 1)
    <br>
    <div class="table-responsive">
        <table id="tablaContactos" class="table table-striped table-bordered">
            <thead id="mensajesTablaMostrar">
                <!-- AQUUI IRAN LOS MENSAJES-->
            </thead>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            function obtenerMensajes(query = "_token:34d1230132d|@rim3d2323d") {
                $.ajax({
                    url: "{{ route('dashboard.cargar.mensajes') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#mensajesTablaMostrar').html(data.result);
                    }
                })
            }
            obtenerMensajes("_token:34d1230132d|@rim3d2323d");

            $(document).on('click', '.eliminarMensajeEmail', function() {
                var id = $(this).attr('id');
                var _token = $(this).attr('_token');

                $('#mensajeVerNumero' + id).fadeOut();

                if (confirm("Estas seguro que quieres eliminar este mensaje?")) {
                    $.ajax({
                        url: "{{ route('dashboard.delete.mensaje') }}/" + id,
                        method: "DELETE",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            obtenerMensajes("_token:34d1230132d|@rim3d2323d");
                        }
                    })
                } else {
                    return false;
                }
            });
            $(document).on('click', '.verMensajeEmail', function() {
                var id = $(this).attr('id');
                var _token = $(this).attr('_token');
    
                $.ajax({
                    url: "{{ route('dashboard.view.mensaje') }}/" + id,
                    method: "post",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $("#mensajeVerNumero" + id).html(data.result);
                        $('#mensajeVerNumero' + id).fadeIn();
                    }
                })
            });

            $(document).on('click', '.responderMensajeEmail', function() {
                var id = $(this).attr('id');
                var _token = $(this).attr('_token');
    
                $.ajax({
                    url: "{{ route('dashboard.responder.mensaje') }}/" + id,
                    method: "post",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $("#mensajeVerNumero" + id).html(data.result);
                        $('#mensajeVerNumero' + id).fadeIn();
                    }
                })
            });
        });

    </script>

@endif
