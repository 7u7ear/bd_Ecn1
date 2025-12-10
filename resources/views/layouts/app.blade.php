<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title', 'bd_ecn1')</title>
</head>
<body>
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/LOGO-ESEACERAMICA1-ALTA-40x73.jpg') }}"
           alt="Logo Escuela"
           height="60">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Inicio -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
        </li>

        <!-- Link genérico -->
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Alumnos</a></li>
            <li><a class="dropdown-item" href="#">Secretaria</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Tramitaciones</a></li>
          </ul>
        </li>

        <!-- Disabled -->
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>

        <!-- Nuevo link: Docentes Eliminados -->
        <li class="nav-item">
          <a class="nav-link text-warning fw-bold" href="{{ route('docentes.trash') }}">
            Docentes Eliminados
          </a>
        </li>
      </ul>

      <!-- Buscador -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="ACA VA A IR EL LOGIN" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <!-- Contenido dinámico -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer fijo -->
    <footer>
        © 2026 Escuela Superior de Enseñanza Artística de Cerámica Nº1. Bulnes 45, CABA.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
