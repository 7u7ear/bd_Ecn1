@extends('layouts.app')

@section('title', 'Editar Tramitación')

@section('content')
<div class="container mt-4">
    <h2>Editar Tramitación</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tramitaciones.update', $tramitacion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="expediente" class="form-label">Expediente</label>
            <input type="text" name="expediente" class="form-control"
                   value="{{ old('expediente', $tramitacion->expediente) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control"
                   value="{{ old('fecha', $tramitacion->fecha) }}" required>
        </div>

        <div class="mb-3">
            <label for="abm" class="form-label">Tipo de movimiento</label>
            <select name="abm" class="form-select" required>
                <option value="alta" {{ old('abm', $tramitacion->abm)=='alta' ? 'selected' : '' }}>Alta</option>
                <option value="baja" {{ old('abm', $tramitacion->abm)=='baja' ? 'selected' : '' }}>Baja</option>
                <option value="modificacion" {{ old('abm', $tramitacion->abm)=='modificacion' ? 'selected' : '' }}>Modificación</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cargo_docente_id" class="form-label">Docente / Cargo</label>
            <select name="cargo_docente_id" class="form-select" required>
                @foreach($cargosDocentes as $cd)
                    <option value="{{ $cd->id }}"
                        {{ old('cargo_docente_id', $tramitacion->cargo_docente_id) == $cd->id ? 'selected' : '' }}>
                        {{ $cd->docente->apellido }}, {{ $cd->docente->nombre }}
                        — {{ $cd->cargo->nombre }} (Puesto {{ $cd->cargo->numero_puesto }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="codigo_tramite_id" class="form-label">Código de trámite</label>
            <select name="codigo_tramite_id" class="form-select" required>
                @foreach($codigosTramite as $codigo)
                    <option value="{{ $codigo->id }}"
                        {{ old('codigo_tramite_id', $tramitacion->codigo_tramite_id) == $codigo->id ? 'selected' : '' }}>
                        {{ $codigo->codigo }} - {{ $codigo->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="causal_id" class="form-label">Causal</label>
            <select name="causal_id" class="form-select">
                <option value="">-- Sin causal --</option>
                @foreach($causales as $causal)
                    <option value="{{ $causal->id }}"
                        {{ old('causal_id', $tramitacion->causal_id) == $causal->id ? 'selected' : '' }}>
                        {{ $causal->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $tramitacion->observaciones) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="en_tramitacion" {{ old('estado', $tramitacion->estado)=='en_tramitacion' ? 'selected' : '' }}>En tramitación</option>
                <option value="urgente" {{ old('estado', $tramitacion->estado)=='urgente' ? 'selected' : '' }}>Urgente</option>
                <option value="realizado" {{ old('estado', $tramitacion->estado)=='realizado' ? 'selected' : '' }}>Realizado</option>
                <option value="listo" {{ old('estado', $tramitacion->estado)=='listo' ? 'selected' : '' }}>Listo</option>
                <option value="espera_documentacion" {{ old('estado', $tramitacion->estado)=='espera_documentacion' ? 'selected' : '' }}>Espera documentación</option>
                <option value="caratulado" {{ old('estado', $tramitacion->estado)=='caratulado' ? 'selected' : '' }}>Caratulado</option>
                <option value="a_la_guarda" {{ old('estado', $tramitacion->estado)=='a_la_guarda' ? 'selected' : '' }}>A la guarda</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('tramitaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
