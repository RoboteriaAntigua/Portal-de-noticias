{{--Heredamos la plantilla --}}
@extends('layout.planti')


@section('contenido')
<body>
    {{--Titulo--}}
    <div class="container-fluid ">
    <h1 class="title mx-5">{{$noticia->title}}</h1><br><br>


    <p class="text">Escrita por: {{$noticia->autor}} </p>

    <p>Contenido: {{$noticia->content}} </p>

    <p>Una noticia puede tener muchos suscriptores: </p>
    <p>Suscriptores:{{$names}} </p>

    <br/>


    <form action="{{route('News.destroy',$noticia)}}" method="POST">
        @csrf
        <a href="{{route('News.edit',$noticia)}}" class="btn btn-success">Editar noticia </a>
        <a href="{{route('index')}}" class="btn btn-primary">Volver al index </a>
        @method('DELETE')  <!--Directiva de blade para pasar el metodo delete, que html no reconoce -->
        <button type="submit" class="btn btn-danger">Eliminar Noticia </button>
    </form>

      {{--Para agregar suscriptores de forma manual (con fines de prueba)--}}
      <form action="{{route('News.agregar_suscriptor',$noticia)}}" method="POST">
        @csrf
            <select class="form-select m-3" name="suscriptor">
                <option selected>Lectores para suscribir manualmente</option>
                @foreach($readers as $lector){
                    <option value="{{$lector->id}}">{{$lector->name}}</option>
                }
                @endforeach
              </select>

        <button type="submit" class="btn btn-dark m-3">Agregar suscritor</button>
        </form>
    </div>
</body>
@endsection

