<div class="mx-auto p-2 border-right">

    <form id="addNewsForm" action="{{ route('dashboard.create.new') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h5><strong>Crear nueva noticia</strong></h5>
        <div id="succesAddNews" class="alert alert-success" role="alert"></div>
        <div class="form-group">
            <label for="tituloNoticia">Titulo de la noticia</label>
            <textarea name="titulo" type="text" class="form-control" id="tituloNoticia" placeholder="Titulo" rows="3"
                value="{{ old('titlo') }}"></textarea>
            <span id="tituloNoticiaError" style="color:red" class="help-block"></span>
            {!! $errors->first('titulo', '<span style="color:red" class="help-block">:message</span><br>') !!}
        </div>
        <div class="form-group">
            <label for="subtituloNoticia">Substitutlo de la noticia</label>
            <textarea name="subtitulo" type="text" class="form-control" id="subtituloNoticia" placeholder="Subtitulo"
                rows="3" value="{{ old('subtitulo') }}"></textarea>
            {!! $errors->first('subtitulo', '<span style="color:red" class="help-block">:message</span><br>') !!}
        </div>
        <div class="form-group">
            <label for="textArea">Contenido</label>
            <textarea name="textoNoticia" id="editor1" rows="10" cols="80">

            </textarea>
            <span id="textAreaError" style="color:red" class="help-block"></span>
            {!! $errors->first('textoNoticia', '<span style="color:red" class="help-block">:message</span><br>') !!}
            <script>
                CKEDITOR.replace('editor1');

            </script>
        </div>
        <hr>
        <div class="form-group">
            <label for="video">Video YouTube</label>
            <input name="video" class="form-control" id="videoYoutube" placeholder="Video de YouTube">
            <small class="form-text text-muted">Dejar el campo vacio en caso de que la noticia no sea un video de
                YouTube.<br>
                AVISO: el link de video de YouTube debe tener la siguente nomenclatura: https://youtu.be/gcWGpA2Q44I
                <br>
                Dale click en compartir video en YouTube para obtener en el link.</small>
        </div>
        <hr>
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlFile1">Importar Imagen</label>
                <input name="importarImagen" type="file" class="form-control-file" id="imagenNoticia"
                    value="{{ old('importarImagen') }}">
                <span id="imagenNoticiaError" style="color:red" class="help-block"></span>
                {!! $errors->first('importarImagen', '<span style="color:red" class="help-block">:message</span><br>')
                !!}
            </div>
            <div class="form-group col-md-4">
                <label for="inputState"><strong>Categoria</strong></label>
                @include('layouts.components.NoticiasPanel.selectCategoria', ['categorias' => $categorias] )
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Añadir noticia</button>
    </form>
    <br><br><br><br><br><br><br><br><br>
</div>
<script>
    $(document).ready(function() {
        $("#succesAddNews").fadeOut();
        $("#addNewsForm").on('submit', function(event) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            event.preventDefault();
            $("#tituloNoticiaError").fadeOut();
            $("#textAreaError").fadeOut();
            $("#imagenNoticiaError").fadeOut();
            $("#succesAddNews").fadeOut();

            $.ajax({
                url: "{{ route('dashboard.create.new') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#succesAddNews").fadeIn();
                    $("#succesAddNews").text(data.result);
                    $("#addNewsForm")[0].reset();
                },
                error: function(error) {
                    if (error.responseJSON.errors.importarImagen) {
                        $("#imagenNoticiaError").text(error.responseJSON.errors
                                .importarImagen[0])
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.textoNoticia) {
                        $("#textAreaError").text(error.responseJSON.errors
                                .textoNoticia)
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.titulo) {
                        $("#tituloNoticiaError").text(error.responseJSON.errors
                                .titulo)
                            .fadeIn();
                    }
                }
            })
        });
    });

</script>
