@extends('layouts.app')

@section('content')
    <h1>Editar docente</h1>

    <form method="POST" action="{{ route('docentes.update', $docente) }}">
        @csrf
        @method('PUT')

        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $docente->nombre) }}"><br>

        <label>Apellido</label>
        <input type="text" name="apellido" value="{{ old('apellido', $docente->apellido) }}"><br>

        <button type="submit">Actualizar</button>
    </form>

    <p><a href="{{ route('docentes.index') }}">Volver al listado</a></p>
@endsection
