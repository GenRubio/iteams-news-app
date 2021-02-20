<div class="mx-auto p-2 border-right">
    <hr>
    <form id="editNoticiasForm">
        {{ csrf_field() }}
        <p style="color: rgb(235, 181, 3)">
            <strong>AVISO</strong><br>
            La imagen por defecto guardada es la imagen principal de la noticia.<br>
            La categoria por defecto es la categoria de noticia.
        </p>
        <h5><strong>Editar noticia</strong></h5>
        <div id="succesEditNews" class="alert alert-success" role="alert"></div>
        <div id="errorEditNews" class="alert alert-danger" role="alert"></div>
        <input type="hidden" name="idNoticia" value="{{ $noticia->id }}">
        <div class="form-group">
            <label for="tituloNoticia">Titulo de la noticia</label>
            <input name="tituloEdit" type="text" class="form-control" id="tituloNoticiaEdit" placeholder="Titulo"
                value="{{ $noticia->titulo }}">
            <span id="tituloNoticiaErrorEdit" style="color:red" class="help-block"></span>
            {!! $errors->first('tituloEdit', '<span style="color:red" class="help-block">:message</span><br>') !!}
        </div>
        <div class="form-group">
            <label for="subtituloNoticia">Substitutlo de la noticia</label>
            <input name="subtituloEdit" type="text" class="form-control" id="subtituloNoticiaEdit"
                placeholder="Subtitulo" value="{{ $noticia->sub_titulo }}">
            {!! $errors->first('subtituloEdit', '<span style="color:red" class="help-block">:message</span><br>') !!}
        </div>
        <div class="form-group">
            <label for="textArea">Contenido</label>
            <textarea name="textoNoticiaEdit" class="form-control" id="textAreaEdit" rows="8"
                placeholder="Noticia">{{ $noticia->noticia }}</textarea>
            <span id="textAreaErrorEdit" style="color:red" class="help-block"></span>
            {!! $errors->first('textoNoticiaEditEdit', '<span style="color:red" class="help-block">:message</span><br>')
            !!}
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlFile1">Importar Imagen</label>
                <input name="importarImagenEdit" type="file" class="form-control-file" id="imagenNoticiaEdit">
                <span id="imagenNoticiaErrorEdit" style="color:red" class="help-block"></span>
                {!! $errors->first(
                'importarImagenEdit',
                '<span style="color:red" class="help-block">:message</span><br>',
                ) !!}
            </div>
            <div class="form-group col-md-4">
                <label for="inputState"><strong>Categoria</strong></label>
                @include('layouts.components.NoticiasPanel.selectCategoria', ['categorias' => $categorias] )
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
    <br><br><br>
</div>
<script>
    $(document).ready(function() {
        $("#succesEditNews").fadeOut();
        $("#errorEditNews").fadeOut();
        $("#editNoticiasForm").on('submit', function(event) {
            event.preventDefault();
            $("#tituloNoticiaErrorEdit").fadeOut();
            $("#textAreaErrorEdit").fadeOut();
            $("#imagenNoticiaErrorEdit").fadeOut();
            $("#succesEditNews").fadeOut();
            $("#errorEditNews").fadeOut();

            $.ajax({
                url: "{{ route('dashboard.edit.news') }}",
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.result == "Error. Hay una noticia con el mismo titulo.") {
                        $("#errorEditNews").fadeIn();
                        $("#errorEditNews").text(data.result);
                    } else {
                        $("#succesEditNews").fadeIn();
                        $("#succesEditNews").text(data.result);
                    }

                },
                error: function(error) {
                    if (error.responseJSON.errors.importarImagenEdit) {
                        $("#imagenNoticiaErrorEdit").text(error.responseJSON.errors
                                .importarImagenEdit[0])
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.textoNoticiaEdit) {
                        $("#textAreaErrorEdit").text(error.responseJSON.errors
                                .textoNoticiaEdit)
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.tituloEdit) {
                        $("#tituloNoticiaErrorEdit").text(error.responseJSON.errors
                                .tituloEdit)
                            .fadeIn();
                    }
                }
            })
        });
    });

</script>
