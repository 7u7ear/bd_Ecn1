@extends('layouts.app')

@section('title', 'Docentes Eliminados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Docentes Eliminados</h1>
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>

    @if($docentesEliminados->isEmpty())
        <div class="alert alert-info">
            No hay docentes eliminados.
        </div>
    @else
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentesEliminados as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->apellido }}</td>
                        <td>{{ $docente->email }}</td>
                        <td class="text-center d-flex justify-content-center gap-2">
                            <!-- Restaurar -->
                            <form action="{{ route('docentes.restore', $docente->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    Restaurar
                                </button>
                            </form>

                            <!-- Eliminar definitivamente -->
                            <form action="{{ route('docentes.forceDelete', $docente->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar definitivamente este docente?')">
                                    Borrar definitivo
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
