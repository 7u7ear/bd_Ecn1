@extends('layouts.app')

@section('title', 'Listado de Docentes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-primary">+ Nuevo docente</a>
    </div>

    {{-- 📌 El buscador como en tu viejo sistema --}}
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Buscar docente...">
    </div>

    <script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var filter = this.value.toLowerCase();
        var rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
    </script>

    @if ($docentes->isEmpty())
        <div class="alert alert-info">
            No hay docentes cargados todavía.
        </div>
    @else
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID RRHH</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->rrhh_id }}</td>
                        <td>{{ $docente->apellido }}</td>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este docente?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
