@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="mx-auto" style="width: 400px;">
        <form method="POST" action="{{ route('cambiar.password.save') }}">
            {{ csrf_field() }}
            <input type="hidden" name="userId" value="{{ $userId }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <h1><strong>Cambiar contraseña</strong></h1>
            <hr />
            <br>
            <div class="form-group">
                <input style="height:50px; font-size: 18px;" name="password" type="password" class="form-control "
                    id="forImputPassword" placeholder="Password" value="{{ old('password') }}" required>
                    {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
            <div class="form-group">
                <input style="height:50px; font-size: 18px;" name="passwordRepeat" type="password" class="form-control "
                    id="forImputPassword" placeholder="Reptire Password" value="{{ old('passwordRepeat') }}" required>
                    {!! $errors->first('passwordRepeat', '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
            <button style="height:45px" type="submit" class="btn btn-outline-success btn-block">Cambiar</button>
        </form>
    </div>
</div>
<br><br>
<hr />
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
