@if (auth()->user()->admin == 1)
<h1 style="color:gold"><strong>{{ auth()->user()->nom }}</strong></h1>
@else
<h1><strong>{{ auth()->user()->nom }}</strong></h1>
@endif
<div class="mx-auto border-right">
<div class="d-flex bd-highlight">
    <div class=" flex-fill bd-highlight">
        <div style="background-color: #f1f1f1; width: 200px; height: 240px;">
            @if (auth()->user()->img_perfil != '')
                <img src="{{ auth()->user()->img_perfil }}" width="200" height="240">
            @endif
        </div>
        <form action="{{ route('dashboard.upload.image') }}" method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlFile1">Importar 200px x 240px Recomendado</label>
                <input name="importarAvatar" type="file" class="form-control-file"
                    id="exampleFormControlFile1">
            </div>
            {!! $errors->first('importarAvatar', '<span style="color:red"
                class="help-block">:message</span><br>') !!}
            <button type="submit" class="btn btn-primary">Añadir avatar</button>
        </form>
    </div>
    <div class="p-6 flex-fill">
        <h5>Email: {{ auth()->user()->email }}</h5>
        <h5>Data Registro: {{ auth()->user()->data_registro }}</h5>
    </div>
</div>
</div>