@extends('layouts.app')

@section('title', 'Tramitaciones')

@section('content')
<div class="container-fluid mt-4">

    <h2 class="mb-3">Tramitaciones</h2>

    <a href="{{ route('tramitaciones.create') }}" class="btn btn-primary mb-3">
        Nueva Tramitación
    </a>

    {{-- Buscador --}}
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control"
               placeholder="Buscar por docente, expediente, cargo, trámite...">
    </div>

    @if ($tramitaciones->isEmpty())
        <div class="alert alert-info">
            No hay tramitaciones cargadas.
        </div>
    @else

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary text-white">
                <tr>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Cargo</th>
                    <th>Rol</th>
                    <th>Docente</th>
                    <th>ABM</th>
                    <th>Cód. Trámite</th>
                    <th>Trámite</th>
                    <th>Expediente</th>
                    <th>Causal</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @foreach (
                $tramitaciones->sortBy(fn($t) =>
                    in_array($t->estado, ['realizado','finalizado']) ? 1 : 0
                ) as $tramite
            )
                <tr class="{{ in_array($tramite->estado, ['realizado','finalizado']) ? 'table-secondary' : '' }}">
                    <td>
                        {{ \Carbon\Carbon::parse($tramite->fecha)->format('d/m/Y') }}
                    </td>

                    <td>
                        <span class="badge
                            {{ $tramite->estado == 'urgente' ? 'bg-danger' : '' }}
                            {{ $tramite->estado == 'en_tramitacion' ? 'bg-warning text-dark' : '' }}
                            {{ $tramite->estado == 'realizado' ? 'bg-success' : '' }}">
                            {{ str_replace('_',' ', $tramite->estado) }}
                        </span>
                    </td>

                    <td>
                        {{ $tramite->cargoDocente->cargo->numero_puesto }}
                    </td>

                    <td>
                        {{ $tramite->cargoDocente->rol }}
                    </td>

                    <td>
                        {{ $tramite->cargoDocente->docente->apellido }},
                        {{ $tramite->cargoDocente->docente->nombre }}
                    </td>

                    <td>
                        {{ strtoupper($tramite->abm) }}
                    </td>

                    <td>
                        {{ $tramite->codigoTramite->codigo }}
                    </td>

                    <td>
                        {{ $tramite->codigoTramite->descripcion_tramite }}
                    </td>

                    <td>
                        {{ $tramite->expediente }}
                    </td>

                    <td>
                        {{ $tramite->causal?->nombre ?? '—' }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('tramitaciones.show', $tramite) }}"
                           class="btn btn-sm btn-primary">
                            Ver
                        </a>

                        <a href="{{ route('tramitaciones.edit', $tramite) }}"
                           class="btn btn-sm btn-success">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

{{-- Buscador JS --}}
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});
</script>
@endsection
