@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="mx-auto" style="width: 400px;">
            <form method="POST" action="{{ url('login') }}">
                {{ csrf_field() }}
                <h1><strong>Login Panel</strong></h1>
                <hr />
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @else
                    <br>
                @endif
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="nombre" type="text" class="form-control"
                        id="forInputUser" placeholder="Usuario" required>
                        {!! $errors->first('nombre', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="password" type="password" class="form-control "
                        id="forImputPassword" placeholder="Password" required>
                        {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <button style="height:45px" name="entrar" type="submit" class="btn btn-outline-success btn-block">Log
                    In</button>
            </form>
            <br>
            <div style="width: 100%;">
                <div class="d-flex justify-content-center">
                    <p>or <a href="{{ route('recover.password') }}">Forgot Password</a></p>
                </div>
                <div class="d-flex justify-content-center">
                    <p>Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
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
