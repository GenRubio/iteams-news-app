<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/b6add834b6.js" crossorigin="anonymous"></script>
    <script src="{{ url('/ckeditor/ckeditor.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/images/logoIco.ico') }}"/>
    @livewireStyles
    @livewireScripts
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid  bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-2 mb-5 ml-6 bg-white rounded">
                <a class="navbar-brand" href="#">
                    <img  src="{{ url('/images/logo.svg') }}" width="70" height="40" class="d-inline-block align-top p-0">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item-inline active">
                            <a class="nav-link" href="/">Noticias<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('dashboard.logout') }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-outline-danger my-1 mr-sm-0" role="button" value="Cerra Session">
                    </form>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            @yield('leftNav')
        </div>
    </div>
</body>
<script src={{ asset('js/ajaxForms.js') }} type="text/javascript"></script>
{{--<script src="http://unpkg.com/turbolinks"></script>--}}
</html>
