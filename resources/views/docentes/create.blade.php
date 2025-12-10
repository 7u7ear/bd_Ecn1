<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('inicio') }}">
            <img src="/img/logo.png" alt="Logo" width="30">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Izquierda --}}
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docentes.index') }}">Docentes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('docentes.trash') }}">
                        Docentes Eliminados
                    </a>
                </li>
            </ul>

            {{-- Derecha: Buscador --}}
            <form class="d-flex" method="GET" action="{{ route('docentes.index') }}">
                <input class="form-control me-2" type="search"
                       name="search" placeholder="Buscar docente..."
                       value="{{ request('search') }}">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>

        </div>
    </div>
</nav>
