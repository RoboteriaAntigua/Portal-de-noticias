{{--Heredamos la plantilla --}}
@extends('layout.planti')


@section('contenido')
    {{--Mostrar un usuario especifico--}}
<div class="container-fluid m-4">
        <h1 class="title mx-5">{{$noticia->title}}</h1><br><br>


        <p class="text"><i>Escrita por: {{$noticia->autor}} </i></p>
        <p class="text">{{$noticia->content}}</p>

</div>

<script>
    /******** Un script de ejemplo que podria usarce para agregar suscripcion *********************/
   document.addEventListener("click",checkCookie);
   function setCookie(cname,cvalue,exdays) {
     const d = new Date();
     d.setTime(d.getTime() + (exdays*24*60*60*1000));
     let expires = "expires=" + d.toUTCString();
     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
   }
   //Funcion para chequear si el cookie existe
   function getCookie(cname) {
     let name = cname + "=";
     let decodedCookie = decodeURIComponent(document.cookie);
     let ca = decodedCookie.split(';');
     for(let i = 0; i < ca.length; i++) {
       let c = ca[i];
       while (c.charAt(0) == ' ') {
         c = c.substring(1);
       }
       if (c.indexOf(name) == 0) {
         return c.substring(name.length, c.length);
       }
     }
     return "";
   }
   function checkCookie() {
     let user = getCookie("username");
     if (user != "") {
       //alert("Bienvenido de vuelta " + user);
     } else {
        user = prompt("Aqui podria hacerce una suscripcion, ingrese nombre:","");
        if (user != "" && user != null) {
          setCookie("username", user, 1);      //vence en un dia
        }
     }
   }
</script>

@endsection



