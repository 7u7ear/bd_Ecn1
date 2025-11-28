@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Alumnos</h2>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Nuevo Alumno</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->apellido }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->dni }}</td>
                <td>{{ $alumno->email }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No hay alumnos cargados.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
