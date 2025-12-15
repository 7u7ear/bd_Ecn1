@extends('layouts.app')

@section('title', 'Editar Docente')

@section('content')
    <div class="card shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h2>Editar Docente</h2>
        </div>
        <div class="card-body">
            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('docentes.update', $docente) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="rrhh_id" class="form-label">ID RRHH</label>
                    <input type="text" name="rrhh_id" class="form-control" value="{{ old('rrhh_id', $docente->rrhh_id) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $docente->nombre) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control"
                        value="{{ old('apellido', $docente->apellido) }}" required>
                </div>

                <div class="mb-3">
                    <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNac" class="form-control"
                        value="{{ old('fechaNac', $docente->fechaNac ? \Carbon\Carbon::parse($docente->fechaNac)->format('Y-m-d') : '') }}"
                        required>
                </div>



                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control" value="{{ old('dni', $docente->dni) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="cuil" class="form-label">CUIL</label>
                    <input type="text" name="cuil" class="form-control" value="{{ old('cuil', $docente->cuil) }}"
                        required>
                    <small class="text-muted">Ingresar solo números, sin guiones.</small>
                </div>

                <div class="mb-3">
                    <label for="fichaCensal" class="form-label">Ficha Censal</label>
                    <input type="text" name="fichaCensal" class="form-control"
                        value="{{ old('fichaCensal', $docente->fichaCensal) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $docente->email) }}">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $docente->telefono) }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Actualizar</button>&nbsp; &nbsp;
                    <a href="{{ route('docentes.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
