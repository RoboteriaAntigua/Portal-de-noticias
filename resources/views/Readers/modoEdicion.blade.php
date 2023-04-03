@extends('layout.planti') {{--Llamo a la plantilla--}}

@section('contenido')   {{--Contenido especifico de pagina index--}}

<div class="container-fluid p-5 ">

    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h1>Todos los usuarios en modo edicion </h1><br>
    <table class="table">
    {{--Mostramos todas los readers--}}
    <a href="{{route('Readers.create')}}"class="btn btn-success btn-lg m-3">crear usuario </a>
    <thead>
        <tr>
          <th>nombre </th>
          <th>apellido</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
            @foreach ($lector as $lector)
                <tr>
                    <td class="v-align-middle"><a href="{{route('Readers.show',$lector->id)}}" class="btn "> {{$lector->name}}</a></td>
                    <td class="v-align-middle"><a href="{{route('Readers.show',$lector->id)}}" class="btn ">{{$lector->last_name}}</a></td>
                    {{--Boton para borrar un usuario--}}
                    <td class="v-align-middle col-2">
                        <form action="{{ route('Readers.destroy',$lector->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ route('Readers.edit',$lector->id) }}" class="btn btn-primary">Editar</a>
                          <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                      </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</div>

{{--Confirmacion antes de borrar una noticia--}}
<script type="text/javascript">
    function confirmarEliminar(){
        var x= confirm("Estas seguro de borrarlo?");
        if(x){
            return true;}
        else
            {return false;}
    }
    </script>
