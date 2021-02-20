<div class="mx-auto border-right">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-fill bd-highlight">
            <form id="changePasswordForm" action="{{ route('dashboard.recover.password') }}" method="POST">
                {{ csrf_field() }}
                <h5><strong>Cambiar contraseña</strong></h5>
                <div id="succesPassword" class="alert alert-success" role="alert"></div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Contraseña Actual</label>
                    <input id="passwordActual" name="passwordActual" type="password" class="form-control"
                        id="exampleInputPassword3" placeholder="Contraseña Actual">
                    <span id="passwordActualError" style="color:red" class="help-block"></span>
                    {!! $errors->first('passwordActual', '<span style="color:red"
                        class="help-block">:message</span><br>') !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nueva Contraseña</label>
                    <input id="password" name="password" type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Contraseña">
                    <span id="passwordError" style="color:red" class="help-block"></span>
                    {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span><br>') !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Repite Contraseña</label>
                    <input id="passwordRepeat" name="passwordRepeat" type="password" class="form-control"
                        id="exampleInputPassword1" placeholder="Repetir Contraseña">
                    <span id="passwordRepeatError" style="color:red" class="help-block"></span>
                    {!! $errors->first('passwordRepeat', '<span style="color:red"
                        class="help-block">:message</span><br>') !!}
                </div>
                <button name="recuperarContraseñaNormal" type="submit" class="btn btn-primary">Cambiar
                    Password</button>
            </form>
        </div>
    </div>
    <div class="p-2 flex-fill"></div>
</div>
<script>
    $(document).ready(function() {
        $("#succesPassword").fadeOut();
        $("#changePasswordForm").on('submit', function(event) {
            $("#succesPassword").fadeOut();
            $("#passwordActualError").fadeOut();
            $("#passwordError").fadeOut();
            $("#passwordRepeatError").fadeOut();
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('dashboard.recover.password') }}",
                method: 'PATCH',
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    $("#succesPassword").fadeIn();
                    $("#succesPassword").text(data.result);
                    $("#changePasswordForm")[0].reset();
                },
                error: function(error) {
                    if (error.responseJSON.errors.passwordActual) {
                        $("#passwordActualError").text(error.responseJSON.errors
                                .passwordActual[0])
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.password) {
                        $("#passwordError").text(error.responseJSON.errors
                                .password[0])
                            .fadeIn();
                    }
                    if (error.responseJSON.errors.passwordRepeat) {
                        $("#passwordRepeatError").text(error.responseJSON.errors
                                .passwordRepeat[0])
                            .fadeIn();
                    }
                }
            })
        });
    });

</script>
