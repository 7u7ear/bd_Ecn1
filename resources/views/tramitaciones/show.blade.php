@extends('layouts.app')

@section('title', 'Detalle de Tramitación')

@section('content')
<div class="container mt-4">

    <h2>Detalle de Tramitación</h2>

    {{-- Datos generales --}}
    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($tramitacion->fecha)->format('d/m/Y') }}</p>

            <p><strong>Expediente:</strong> {{ $tramitacion->expediente }}</p>

            <p><strong>Trámite:</strong>
                {{ $tramitacion->codigoTramite->codigo }} –
                {{ $tramitacion->codigoTramite->descripcion_tramite }}
            </p>

            <p><strong>ABM:</strong> {{ ucfirst($tramitacion->abm) }}</p>

            <p><strong>Estado administrativo:</strong> {{ $tramitacion->estado }}</p>

            <p><strong>Docente:</strong>
                {{ $tramitacion->cargoDocente->docente->apellido }},
                {{ $tramitacion->cargoDocente->docente->nombre }}
            </p>

            <p><strong>Cargo:</strong>
                {{ $tramitacion->cargoDocente->cargo->numero_puesto }}
                (Rol {{ $tramitacion->cargoDocente->rol }})
            </p>

            <p><strong>Causal:</strong>
                {{ $tramitacion->causal?->nombre ?? '—' }}
            </p>

            <p><strong>Observaciones:</strong>
                {{ $tramitacion->observaciones ?? '—' }}
            </p>
        </div>
    </div>

    {{-- Historial de períodos --}}
    <h4>Historial de estados</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tramitacion->periodos as $periodo)
                <tr>
                    <td>{{ ucfirst($periodo->estado) }}</td>
                    <td>{{ \Carbon\Carbon::parse($periodo->fecha_inicio)->format('d/m/Y') }}</td>
                    <td>
                        {{ $periodo->fecha_fin
                            ? \Carbon\Carbon::parse($periodo->fecha_fin)->format('d/m/Y')
                            : 'Activo'
                        }}
                    </td>
                    <td>{{ $periodo->observaciones ?? '—' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No hay períodos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('tramitaciones.index') }}" class="btn btn-secondary">
        Volver
    </a>

</div>
@endsection

