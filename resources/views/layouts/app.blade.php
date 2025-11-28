<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>bd_ecn1</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">bd_ecn1</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenido dinámico -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer fijo -->
    <footer>
        © 2025 Escuela Superior de Enseñanza Artística de Cerámica Nº1. Bulnes 45, CABA.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
