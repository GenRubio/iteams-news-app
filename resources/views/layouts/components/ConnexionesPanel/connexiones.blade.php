<div class="mx-auto border-right">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-fill bd-highlight">
            <h5><strong>Ultimas Conexiones</strong></h5>
            <table class="table table-bordered">
                <tr>
                    <th>Index</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                </tr>
                @foreach ($logs as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}
                        <td>{{ $row['nombre'] }}</td>
                        <td>{{ $row['fecha'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>