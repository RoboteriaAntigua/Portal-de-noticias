<!--Heredamos la plantilla -->
@extends('layout.planti')

<!--Modo edicion-->
<!--Para crear un usuario manualmente-->
@section('contenido')
    <div class="container">
        <form action="{{route('Readers.store')}}" method="POST">
        @csrf
          <div class="mb-3">
          <label class="form-label" for="name">name:</label>
          <input type="text" placeholder="Ingrese su nombre..." name="name" value="{{old('name')}}" class="form-control" id="name">
        </div>

        <div class="mb-3">
          <label class="form-label" for="last_name">Apellido:</label>
          <input name="last_name" value="{{old('last_name')}}" placeholder="Apellido..." class="form-control" type="text" id="last_name">        </div>

        <button type="submit" class="btn btn-success">Crear usuario manualmente </button>
        </form>
    </div>

    {{--Directiva para mostrar un error en la validacion--}}
    @error('name')
        <br><small>*{{$message}}</small>
    @enderror

    @error('last_name')
        <br><small>*{{$message}}</small><br>
    @enderror
@endsection
