@extends('layout.planti') {{--Llamo a la plantilla--}}

@if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
@endif


@section('contenido')

<body>
<div class="container-fluid m-3">
    <h1 class="title"> Portal de noticias x </h1>

    <div class="row m-3" onload="probar()">
    {{-- ************************ Mostramos todas las noticias *******************************--}}
        @foreach ($ORM_paginada as $noticia)

        {{--News--}}
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="https://media.istockphoto.com/id/1399559286/es/foto/holograma-del-horizonte-de-la-ciudad-de-alta-tecnolog%C3%ADa-renderizado-3d.jpg?s=612x612&w=is&k=20&c=Y3NXGlmDky7SNZ2zbYvDh08B3az1HcqlgM6tDIftMo8=" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$noticia->title}}</h5>
                <p class ="card-text text-sm"><i><b>{{$noticia->autor}}</b></i></p>
                <p class="card-text">{{$noticia->content}}</p>
                <a href="{{route('show',$noticia->id)}}" class="btn btn-dark" id="id1">Ver noticia</a>
              </div>
            </div>
        @endforeach
    </div>
</div>


</body>
@endsection

