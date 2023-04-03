 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">Portal de noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown">Modo edicion</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('News.modoEdicion')}}">Editar noticias</a></li>
              <li><a class="dropdown-item" href="{{route('Readers.modoEdicion')}}">Editar usuarios </a></li>
              <li><a class="dropdown-item" href="#">A third link</a></li>
            </ul>
          </li>
        </ul>
          <form class="d-flex ">
            <input class="form-control me-2" type="text" placeholder="Search">
            <button class="btn btn-primary" type="button">Search</button>
          </form>

      </div>
    </div>
  </nav>
