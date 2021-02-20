@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mx-auto" style="width: 400px;">
            <form method="POST" action="{{ url('signup') }}">
                {{ csrf_field() }}
                <h1><strong>Registrate</strong></h1>
                <hr />
                <br>
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="nombre" type="text" class="form-control"
                        id="forInputName" placeholder="Nombre" value="{{ old('nombre') }}" required>
                        {!! $errors->first('nombre', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="password" type="password" class="form-control "
                        id="forImputPassword" placeholder="Password" value="{{ old('password') }}" required>
                        {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="passwordRepeat" type="password" class="form-control "
                        id="forImputPassword" placeholder="Password" value="{{ old('passwordRepeat') }}" required>
                        {!! $errors->first('passwordRepeat', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="email" type="email" class="form-control"
                        id="forInputEmail" placeholder="Email" value="{{ old('email') }}" required>
                        {!! $errors->first('email', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <button style="height:45px" name="entrar" type="submit" class="btn btn-outline-success btn-block">Sign Up</button>
            </form>
            <br>
            <div style="width: 100%;">
                <div class="d-flex justify-content-center">
                    <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <hr />
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
