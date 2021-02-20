<div class="container">
    <form>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input name="nombreContacto" type="text" class="form-control" id="nombre" value="{{ $contacto->nombre }}" >
                </div>
            </div>
            <div class="col-8">
            </div>
        </div>
        <div class="form-group">
            <label for="correoElectronico">Email address</label>
            <input name="emailContacto" type="email" class="form-control" id="correoElectronico" value="{{ $contacto->email }}">
        </div>
        <div class="form-group">
            <label for="correoAsunto">Asunto</label>
            <input name="correoAsuntoContacto" type="text" class="form-control" id="correoAsunto" value="{{ $contacto->subject }}">
        </div>
        <div class="form-group">
            <label for="correoTexto">Area de texto</label>
            <textarea name="correoTextoContacto" class="form-control" id="correoTexto" rows="4">{{ $contacto->message }}</textarea>
        </div>
    </form>
</div>
