<br>
<h5><strong>Eliminar noticias</strong></h5>
<div class="form-group row">
    <div class="col-sm-12">
        <input name="searchNews" type="text" class="form-control" id="searchNews" placeholder="Titulo de la noticia...">
    </div>
</div>
<div class="table-responsive">
    <h3 align="center">Total resultados: <span id="total_records"></span></h3>
    <table id="newsTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Data Publicacion</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody id="resultadoNews">

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        function fetch_customer_data(query = '_token:34d1230132d|@rim3d2323d') {
            $.ajax({
                url: "{{ route('dashboard.search.news') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#resultadoNews').html(data.result);
                    $('#total_records').text(data.count);
                }
            })
        }
        $(document).on('keyup', '#searchNews', function() {
            var query = $(this).val();
            if (query == "") {
                query = '_token:34d1230132d|@rim3d2323d';
            }
            fetch_customer_data(query);
        })

        $(document).on('click', '.deleteNews', function() {
            var id = $(this).attr('id');
            var _token = $(this).attr('_token');
            if (confirm("Estas seguro que quieres eliminar esta noticia?")) {
                $.ajax({
                    url: "{{ route('dashboard.delete.news') }}/" + id,
                    method: "DELETE",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        var query = document.getElementById("searchNews").value;
                        fetch_customer_data(query);
                    }
                })
            } else {
                return false;
            }
        });
    });

</script>
