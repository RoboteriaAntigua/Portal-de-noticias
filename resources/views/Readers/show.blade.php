{{--Heredamos la plantilla --}}
@extends('layout.planti')


@section('contenido')
    {{--Mostrar un usuario especifico--}}
    <div class="container-fluid ">
    <h1 class="title mx-5">Lector: {{$lector->name}}, {{$lector->last_name}}</h1><br><br>

    <p> Un lector puede tener muchas suscripciones: </p>
    <p class="text">Suscripto a: {{$titulos}} </p>


    {{--Para borrar el usuario--}}
    <form action="{{route('Readers.destroy',$lector)}}" method="POST">
        @csrf
        <a href="{{route('Readers.edit',$lector)}}" class="btn btn-success">Editar</a>
        @method('DELETE')  {{--Directiva de blade para pasar el metodo delete, que html no reconoce --}}
        <button type="submit" class="btn btn-danger">Eliminar lector </button>
    </form>

    {{--Para agregar suscripciones--}}
    <form action="{{route('Readers.agregar_suscripcion',$lector)}}" method="POST">
    @csrf
        <select class="form-select m-3" name="suscripcion">
            <option selected>Noticias para suscribir manualmente</option>
            @foreach($news as $news){
                <option value="{{$news->id}}">{{$news->title}}</option>
            }
            @endforeach
          </select>

    <button type="submit" class="btn btn-dark m-3">Agregar suscripciones </button>
    </form>
    </div>

@endsection

