<div class="container">
    <div class="alert alert-success" id="succesSendEmailTeams"></div>
    <form id="enviarEmailTeams">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input name="nombreContactoTeams" type="text" class="form-control" id="nombre" value="{{ $contacto->nombre }}">
                </div>
            </div>
            <div class="col-8">
            </div>
        </div>
        <div class="form-group">
            <label for="correoElectronico">Destinatario</label>
            <input name="emailContactoTeams" type="email" class="form-control" id="correoElectronico" value="{{ $contacto->email }}">
            <span id="emailContactoTeamsError" style="color:red" class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="correoAsunto">Asunto</label>
            <input name="correoAsuntoContactoTeams" type="text" class="form-control" id="correoAsunto" value="{{ $contacto->subject }}">
            <span id="correoAsuntoContactoTeamsError" style="color:red" class="help-block"></span>
        </div>
        <hr>
        <h5 style="color: #ff2d20;"><strong>iTeams News Team</strong></h5>
        <div class="form-group">
            <label for="correoTexto">Area de texto</label>
            <textarea name="correoTextoContactoTeams" class="form-control" id="correoTexto" rows="5"></textarea>
            <span id="correoTextoContactoTeamsError" style="color:red" class="help-block"></span>
        </div>
        <input type="submit" class="btn btn-success" value="Enviar Email">
    </form>
</div>
<script>
   $(document).ready(function() {
    $("#succesSendEmailTeams").fadeOut();
    $("#enviarEmailTeams").on('submit', function(event) {
            event.preventDefault();
            $("#emailContactoTeamsError").fadeOut();
            $("#correoAsuntoContactoTeamsError").fadeOut();
            $("#correoTextoContactoTeamsError").fadeOut();
            $("#succesSendEmailTeams").fadeOut();

            $.ajax({
                url: "{{ route('dashboard.send.contact.email') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#succesSendEmailTeams").fadeIn();
                    $("#succesSendEmailTeams").text(data.result);
                    $("#enviarEmailTeams")[0].reset();
                },
                error: function(error) {
                    if (error.responseJSON.errors.emailContactoTeams){
                        $("#emailContactoTeamsError").text(error.responseJSON.errors
                            .emailContactoTeams)
                        .fadeIn();
                    }
                    if (error.responseJSON.errors.correoAsuntoContactoTeams) {
                        $("#correoAsuntoContactoTeamsError").text(error.responseJSON.errors
                                .correoAsuntoContactoTeams)
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.correoTextoContactoTeams) {
                        $("#correoTextoContactoTeamsError").text(error.responseJSON.errors
                                .correoTextoContactoTeams)
                            .fadeIn();
                    }
                }
            })
        });
    });
</script>