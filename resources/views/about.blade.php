@extends('layouts.app')
@section('categorias')
    @foreach ($categorias as $categoria)
        <a class="dropdown-item" href="{{ url('categoria/' . $categoria->id) }}">{{ $categoria->nombre }}</a>
    @endforeach
@endsection
@section('content')
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                allowfullscreen></iframe>
        </div>
    </div>
    <hr>
    @php
    $administradores = \App\Models\Usuario::where('admin', '=', 1)->get();
    @endphp
    @foreach ($administradores as $admin)
        <div class="row">
            <div class="col border-right">
                <img src="{{ $admin->img_perfil }}" , width="160px" , height="210px">
            </div>
            <div class="col-8">
                <h3><strong style="color: #ff2d20">{{ $admin->nom }}</strong></h3>
                @if ($admin->descripcion != '')
                    <p>{{ $admin->descripcion }}</p>
                @else
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic beatae possimus tempore nostrum omnis
                        amet totam, modi molestias sequi animi iure blanditiis at quam in, commodi pariatur quod similique
                        cum?
                        <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quaerat cupiditate error, delectus
                        repudiandae vitae! Eveniet culpa laboriosam numquam magnam placeat eaque, quasi ut quod at! Dolor
                        fugit perferendis veniam.
                    </p>
                @endif
            </div>
            <div class="col"></div>
        </div>
        <hr>
    @endforeach
    <br><br><br>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection