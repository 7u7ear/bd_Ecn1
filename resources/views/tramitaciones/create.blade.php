@extends('layouts.app')

@section('title', 'Nueva Tramitación')

@section('content')
<div class="container mt-4">
    <h2>Registrar Tramitación</h2>

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tramitaciones.store') }}" method="POST">
        @csrf

        {{-- Fecha --}}
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha"
                   class="form-control"
                   value="{{ old('fecha', now()->toDateString()) }}"
                   required>
        </div>

        {{-- Estado administrativo --}}
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="en_tramitacion">En tramitación</option>
                <option value="urgente">Urgente</option>
                <option value="realizado">Realizado</option>
                <option value="espera_documentacion">Espera documentación</option>
                <option value="caratulado">Caratulado</option>
                <option value="a_la_guarda">A la guarda</option>
            </select>
        </div>

        {{-- Cargo + Docente (cargo_docente) --}}
       <div class="mb-3">
    <label for="cargo_docente_id" class="form-label">Docente / Cargo</label>

    <select name="cargo_docente_id" class="form-select" required>
        @foreach($cargosDocentes as $cd)
            <option value="{{ $cd->id }}"
                {{ old('cargo_docente_id', $tramitacion->cargo_docente_id) == $cd->id ? 'selected' : '' }}>

                {{ $cd->docente->apellido }}, {{ $cd->docente->nombre }}
                — Puesto {{ $cd->cargo->numero_puesto }}

            </option>
        @endforeach
    </select>
</div>


        {{-- Código de trámite --}}
        <div class="mb-3">
            <label class="form-label">Código de trámite</label>
            <select name="codigo_tramite_id" class="form-select" required>
                <option value="">-- Seleccionar --</option>
                @foreach($codigosTramite as $codigo)
                    <option value="{{ $codigo->id }}">
                        {{ $codigo->codigo }} - {{ $codigo->descripcion_tramite }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tipo ABM --}}
        <div class="mb-3">
            <label class="form-label">Tipo de movimiento</label>
            <select name="abm" class="form-select" required>
                <option value="alta">Alta</option>
                <option value="baja">Baja</option>
                <option value="modificacion">Modificación</option>
            </select>
        </div>

        {{-- Expediente --}}
        <div class="mb-3">
            <label class="form-label">Expediente</label>
            <input type="text" name="expediente"
                   class="form-control"
                   value="{{ old('expediente') }}"
                   required>
        </div>

        {{-- Causal --}}
        <div class="mb-3">
            <label class="form-label">Causal</label>
            <select name="causal_id" class="form-select">
                <option value="">-- Sin causal --</option>
                @foreach($causales as $causal)
                    <option value="{{ $causal->id }}">
                        {{ $causal->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Observaciones --}}
        <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tramitaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
