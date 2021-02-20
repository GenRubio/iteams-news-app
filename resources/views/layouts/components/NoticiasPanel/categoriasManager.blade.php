<br>
<h5><strong>Categorias Manager</strong></h5>
<div id="succesAddCategori" class="alert alert-success" role="alert"></div>
<div id="errorCategori" class="alert alert-danger" role="alert"></div>
<form id="crearCategoria">
    {!! csrf_field() !!}
    <div class="form-row align-items-center">
        <div class="col-auto">
            <input name="nombreCategoria" type="text" class="form-control mb-2" id="nombreCategoria"
                placeholder="Categoria">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Crear</button>
        </div>
    </div>
    <span id="nombreCategoriaError" style="color:red" class="help-block"></span>
</form>
<br>
<div class="form-group row">
    <div class="col-sm-12">
        <input name="searchCategori" type="text" class="form-control" id="searchCategori"
            placeholder="Busca categoria aquí...">
    </div>
</div>
<div class="table-responsive">
    <h3 align="center">Total resultados: <span id="total_records_categorias"></span></h3>
    <table id="categoriastABLE" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Total Noticias</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody id="resultadoCategorias"></tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $("#succesAddCategori").fadeOut();
        $("#errorCategori").fadeOut();

        function buscar_categorias(query = '_token:34d1230132d|@rim3d2323d') {
            $.ajax({
                url: "{{ route('dashboard.search.categorias') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#resultadoCategorias').html(data.result);
                    $('#total_records_categorias').text(data.count);
                }
            })
        }
        $(document).on('keyup', '#searchCategori', function() {
            var query = $(this).val();
            if (query == "") {
                query = '_token:34d1230132d|@rim3d2323d';
            }
            buscar_categorias(query);
        });
        $(document).on('click', '.updateCategoria', function(event) {
            event.preventDefault();
            $("#succesAddCategori").fadeOut();
            $("#errorCategori").fadeOut();
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ route('dashboard.update.categoria') }}/" + id,
                method: 'PATCH',
                data: {
                    _token: $('#_token').val(),
                    id: id,
                    nombreCategoriaInput: $('.'+id).val()
                },
                dataType: 'json',
                success: function(data) {
                    $("#inputState").html(data.categorias);
                    $("#succesAddCategori").fadeIn();
                    $("#succesAddCategori").text(data.successMessage);
                    var query = document.getElementById("searchCategori").value;
                    buscar_categorias(query);
                },
                error: function(error) {
                    $("#succesAddCategori").fadeOut();
                    $("#errorCategori").text(error.responseJSON.errors
                            .nombreCategoriaInput)
                        .fadeIn();
                }
            })
        });
        $(document).on('click', '.deleteCategoria', function(event) {
            $("#succesAddCategori").fadeOut();
            $("#errorCategori").fadeOut();
            var id = $(this).attr('id');
            if (confirm("Estas seguro que quieres eliminar esta categoria?")) {
                $.ajax({
                    url: "{{ route('dashboard.delete.categoria') }}/" + id,
                    method: "DELETE",
                    data: {
                        _token: $('#_token').val(),
                        id: id
                    },
                    success: function(data) {
                        $("#inputState").html(data.categorias);
                        $("#errorCategori").text(data.successMessage)
                            .fadeIn();
                        var query = document.getElementById("searchCategori").value;
                        buscar_categorias(query);
                    }
                })
            } else {
                return false;
            }
        });
        $("#crearCategoria").on('submit', function(event) {
            $("#succesAddCategori").fadeOut();
            $("#errorCategori").fadeOut();
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('dashboard.create.categori') }}",
                method: 'POST',
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    $("#nombreCategoriaError").fadeOut();
                    $("#inputState").html(data.categorias);
                    $("#succesAddCategori").fadeIn();
                    $("#succesAddCategori").text("Se ha creado nueva categoria -> " +
                        data.categoriaNombre);
                    $("#crearCategoria")[0].reset();
                    var query = document.getElementById("searchCategori").value;
                    if (query != "") {
                        buscar_categorias(query);
                    }
                },
                error: function(error) {
                    $("#succesAddCategori").fadeOut();
                    $("#nombreCategoriaError").text(error.responseJSON.errors
                            .nombreCategoria[0])
                        .fadeIn();
                }
            })
        });
    });

</script>
