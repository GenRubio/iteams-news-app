<br>
<h5><strong>Editar noticias</strong></h5>
<div class="form-group row">
    <div class="col-sm-12">
        <input name="editarNoticia" type="text" class="form-control" id="editarNoticia"
            placeholder="Titulo de la noticia...">
    </div>
</div>
<div class="table-responsive">
    <h3 align="center">Total resultados: <span id="total_records_edit"></span></h3>
    <table id="newsTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Data Publicacion</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody id="resultadoEditarNoticias"></tbody>
    </table>
    <div id="panelNoticiaEditar"></div>
</div>
<script>
    $(document).ready(function() {
        function fetch_customer_data(query = '_token:34d1230132d|@rim3d2323d') {
            $("#panelNoticiaEditar").fadeOut();
            $.ajax({
                url: "{{ route('dashboard.search.news.edit') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#resultadoEditarNoticias').html(data.result);
                    $('#total_records_edit').text(data.count);
                }
            })
        }
        $(document).on('keyup', '#editarNoticia', function() {
            var query = $(this).val();
            if (query == "") {
                query = '_token:34d1230132d|@rim3d2323d';
            }
            fetch_customer_data(query);
        })

        $(document).on('click', '.editarNoticia', function() {
            event.preventDefault();
            fetch_customer_data('_token:34d1230132d|@rim3d2323d');

            var id = $(this).attr('id');
            var _token = $(this).attr('_token');
            $.ajax({
                url: "{{ route('dashboard.obtener.noticia.edit') }}/" + id,
                method: "POST",
                data: {
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    $("#panelNoticiaEditar").html(data.result).fadeIn();
                }
            });
        });
    });

</script>
