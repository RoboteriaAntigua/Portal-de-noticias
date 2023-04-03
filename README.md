<h1> Portal de noticias </h1>

<p> CRUD simple Echo en Laravel 10 y Bootstrap 5 </p>

<h3>  Descripcion del proyecto </h3>
Portal de noticias tiene un formato de vistas responsive para lectores, y un "modo edicion" que permite generar/modificar noticias y lectores.
Actualmente no cuenta con ningun tipo de seguridad ni autenticacion para su simplicidad.
El diagrama entidad relacion es: Dos entidades (readers y News) relacionadas de forma muchos a muchos. Para ello se ha creado una 
tercer tabla: news_readers.
El proyecto cuenta con una barra de navegacion en la cual podemos ver la vista de usuario y tambien dirigirnos al "modo edicion".
Al migrar el proyecto con --seed se completan los campos de las tablas con datos fake, para no aburrir a nadie.


<h3>Puesta en marcha una vez clonado</h3>
<ul>
<li> En la carpeta a instalarlo: git clone https://github.com/RoboteriaAntigua/Portal-de-noticias.git </li>
<li>Instalar las dependencias, ejecutar el comando: Composer install    </li> 
<li>Generar la key de projecto, ejecutar: php artisan key:generate </li>
<li> Renombrar el .env.example a solo .env </li>
<li> En el .env agregar database= DESAFIO-WYLEEX contraseña de usuario de SQL</li>
<li> Crear la Data Base llamada DESAFIO-WYLEX </li>
<li> Corremos las migraciones, ejecutar: php artisan migrate --seed </li>
<li> php artisan serve </li>
<li> Escribimos en el ordenador 127.0.0.1:8000/ </li>
<li> Perdon por la simplesa </li>
</ul>
<p>

