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
                        <td class="text-end">
                            <div>
                            <a href="{{ route('docentes.show', $docente) }}" class="btn btn-primary btn-sm">Ver &nbsp; <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></a>

                            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-success btn-sm">
                                Editar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square ms-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 0 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>

                            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este docente?')">
                                    Eliminar &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
