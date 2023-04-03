<!--Heredamos la plantilla -->
@extends('layout.planti')


<!--Formulario para editar una noticia-->
@section('contenido')
<div class="container-fluid row">
    <h3>Editar Usuario</h3>
    <form action="{{route('Readers.update',$lector)}}" method="POST">
        @method('PUT') {{--En html no existe el metodo PUT asi que hay que pasar una directiva--}}
        @csrf

        <label class="form-label col-3"> name:<br>
            <input type="text" name= "name" value="{{old('title',$lector->name)}}" class="form-control">
         </label><br>

         <label class="form-label col-3"> apellido:<br>
            <input type="text" name="last_name" value="{{old('autor',$lector->last_name)}}" class="form-control">
         </label><br>

         <br>

        <button type="submit" class="btn btn-success col-1">Actualizar </button>
        <a href="{{ route('Readers.modoEdicion') }}" class="btn btn-warning col-1">Cancelar</a>



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
