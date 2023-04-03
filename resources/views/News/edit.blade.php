<!--Heredamos la plantilla -->
@extends('layout.planti')


<!--Formulario para editar una noticia-->
@section('contenido')
<div class="container-fluid row">

    <h3>Editar Noticia</h3>

    <form action="{{route('News.update',$noticia)}}" method="POST">
        @method('PUT') {{--En html no existe el metodo PUT asi que hay que pasar una directiva--}}
        @csrf

        <label class="form-label col-3"> title:<br>
            <input type="text" name= "title" value="{{old('title',$noticia->title)}}" class="form-control">
         </label><br>

         <label class="form-label col-3"> autor:<br>
            <input type="text" name="autor" value="{{old('autor',$noticia->autor)}}" class="form-control">
         </label><br>

         <label class="form-label col-3"> content:<br>
            <textarea name="content" rows=5 class="form-control">{{old('content',$noticia->content)}}</textarea>
         </label>

         <br>

        <button type="submit" class="btn btn-success col-1">Actualizar </button>
        <a href="{{ route('index') }}" class="btn btn-warning col-1">Cancelar</a>
        <a href="{{route('index')}}" class="btn btn-info col-1">inicio</a>

    </form>
</div>
     {{--Directiva para mostrar un error en la validacion--}}
     @error('title')
     <br><small>*{{$message}}</small>
     @enderror

    @error('content')
      <br><small>*{{$message}}</small><br>
    @enderror

    @error('descripcion')
    <br><small>*{{$message}}</small><br>
    @enderror
@endsection
