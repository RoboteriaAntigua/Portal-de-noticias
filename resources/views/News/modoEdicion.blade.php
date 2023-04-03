@extends('layout.planti') {{--Llamo a la plantilla--}}

@section('contenido')   {{--Contenido especifico de pagina index--}}
<body>
<div class="container-fluid p-5 ">

    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h1 >Todas las noticias en modo edicion </h1>

    <table class="table">
    {{--Mostramos todas las noticias--}}
        <thead>
            <tr>
              <th><a href="{{route('News.create')}}"class="btn btn-success btn-lg">crear Noticia </a></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
                @foreach ($ORM_paginada as $noticia)
                    <tr>
                        <td class="v-align-middle"><a href="{{route('News.show',[$noticia->id])}}" class="btn "> {{$noticia->title}}</a></td>
                        <td class="v-align-middle"><a href="{{route('News.show',[$noticia->id])}}" class="btn ">{{$noticia->autor}}</a></td>
                        <td class="v-align-middle"><a href="{{route('News.show',[$noticia->id])}}" class="btn ">{{$noticia->content}}</a></td>


                {{--Boton para borrar una noticia--}}
                <td class="v-align-middle col-2">
                    <form action="{{ route('News.destroy',$noticia->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('News.edit',$noticia->id) }}" class="btn btn-primary">Editar</a>
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                  </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        @endsection
</div>
</body>

{{--Confirmacion antes de borrar una noticia--}}
<script type="text/javascript">
    function confirmarEliminar(){
        var x= confirm("Estas seguro de borrarla?");
        if(x){
            return true;}
        else
            {return false;}
    }
    </script>
