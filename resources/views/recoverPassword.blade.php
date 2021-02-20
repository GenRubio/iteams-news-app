@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mx-auto" style="width: 400px;">
            <form method="POST" action="{{ route('resive.user.mail') }}">
                {{ csrf_field() }}
                <h1><strong>Recover Password</strong></h1>
                <hr />
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @else
                    <br>
                @endif
                <div class="form-group">
                    <input style="height:50px; font-size: 18px;" name="email" type="email" class="form-control"
                        id="forInputUser" placeholder="Email" required>
                    {!! $errors->first('email', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <button style="height:45px" name="entrar" type="submit"
                    class="btn btn-outline-success btn-block">Send</button>
            </form>
        </div>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <hr />
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
