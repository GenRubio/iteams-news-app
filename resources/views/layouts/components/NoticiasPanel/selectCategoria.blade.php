<select name="categoria" id="inputState" class="form-control-sm">
    <option value="" selected></option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
    @endforeach
</select>
