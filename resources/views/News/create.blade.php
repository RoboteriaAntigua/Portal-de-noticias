<!--Heredamos la plantilla -->
@extends('layout.planti')



<!--Contenido especifico multilinea-->
@section('contenido')

    <div class="container-fluid m-3">

        <h1>Crear Noticia </h1>

        <form action="{{route('News.store')}}" method="POST">
        @csrf
          <div class="mb-3">
          <label class="form-label" for="title">title:</label>
          <input type="text" placeholder="Ingrese el titulo" name="title" value="{{old('title')}}" class="form-control" id="title">
        </div>

        <div class="mb-3">
          <label class="form-label" for="autor">Autor:</label>
          <input name="autor" value="{{old('autor')}}" placeholder="Escritor por..." class="form-control" type="text" id="autor">        </div>

        <div class="mb-3">
          <label class="form-label" for="content"> Contenido: </label>
          <textarea name="content" rows=5 value="{{old('content')}}" placeholder="Ingrese lo que quiera"  class="form-control"  id="content" rows="10" > </textarea>
        </div>
        <button type="submit" class="btn btn-success">Crear una gran noticia </button>
        </form>
    </div>

    {{--Directiva para mostrar un error en la validacion--}}
    @error('title')
        <br><small>*{{$message}}</small>
    @enderror

    @error('content')
        <br><small>*{{$message}}</small><br>
    @enderror

    @error('autor')
    <br><small>*{{$message}}</small><br>
    @enderror
@endsection
