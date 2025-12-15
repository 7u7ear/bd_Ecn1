<?php

namespace App\Http\Controllers;
use App\Models\TramitacionPeriodo;
use App\Models\Tramitacion;
use App\Models\CargoDocente;
use App\Models\CodigoTramite;
use App\Models\Causal;
use Illuminate\Http\Request;

class TramitacionController extends Controller
{
    /**
     * Listado de tramitaciones
     */
    public function index()
    {
        $tramitaciones = Tramitacion::with([
            'cargoDocente.docente',
            'cargoDocente.cargo',
            'codigoTramite',
            'causal'
        ])
        ->orderBy('fecha', 'desc')
        ->get();

        return view('tramitaciones.index', compact('tramitaciones'));
    }

    /**
     * Formulario de alta
     */
    public function create()
    {
        // Movimientos activos de cargos
        $cargosDocentes = CargoDocente::where('estado', 'activo')
            ->with(['docente', 'cargo'])
            ->orderBy('id')
            ->get();

        // Códigos oficiales de trámite
        $codigosTramite = CodigoTramite::where('activo', true)
            ->orderBy('codigo')
            ->get();

        $causales = Causal::orderBy('nombre')->get();

        return view('tramitaciones.create', compact(
            'cargosDocentes',
            'codigosTramite',
            'causales'
        ));
    }

    /**
     * Guardar tramitación
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'fecha'               => 'required|date',
        'estado'              => 'required|in:urgente,realizado,en_tramitacion,espera_documentacion,caratulado,a_la_guarda',
        'cargo_docente_id'    => 'required|exists:cargo_docente,id',
        'codigo_tramite_id'   => 'required|exists:codigo_tramites,id',
        'abm'                 => 'required|in:alta,baja,modificacion',
        'expediente'          => 'required|unique:tramitaciones,expediente',
        'causal_id'           => 'nullable|exists:causales,id',
        'observaciones'       => 'nullable|string',
    ]);

    // ✅ 1. Crear la tramitación
    $tramitacion = Tramitacion::create($validated);

    // ✅ 2. Crear el primer período
    TramitacionPeriodo::create([
        'tramitacion_id' => $tramitacion->id,
        'estado'         => 'activo',
        'fecha_inicio'   => $tramitacion->fecha,
        'observaciones'  => 'Inicio de tramitación',
    ]);

    return redirect()
        ->route('tramitaciones.index')
        ->with('success', 'Tramitación creada correctamente.');
}


    /**
     * Mostrar una tramitación
     */
    public function show(Tramitacion $tramitacion)
    {
        $tramitacion->load([
            'cargoDocente.docente',
            'cargoDocente.cargo',
            'codigoTramite',
            'causal',
            'periodos'
        ]);

        return view('tramitaciones.show', compact('tramitacion'));
    }

    /**
     * Formulario de edición
     */
    public function edit(Tramitacion $tramitacion)
{
    $cargosDocentes = CargoDocente::with(['docente', 'cargo'])
        ->where('estado', 'activo')
        ->get();

    $codigosTramite = CodigoTramite::where('activo', true)
        ->orderBy('codigo')
        ->get();

    $causales = Causal::orderBy('nombre')->get();

    return view('tramitaciones.edit', compact(
        'tramitacion',
        'cargosDocentes',
        'codigosTramite',
        'causales'
    ));
}


    /**
     * Actualizar tramitación
     */
    public function update(Request $request, Tramitacion $tramitacion)
    {
        $validated = $request->validate([
            'fecha'               => 'required|date',
            'estado'              => 'required|in:urgente,realizado,en_tramitacion,espera_documentacion,caratulado,a_la_guarda',
            'cargo_docente_id'    => 'required|exists:cargo_docente,id',
            'codigo_tramite_id'   => 'required|exists:codigo_tramites,id',
            'abm'                 => 'required|in:alta,baja,modificacion',
            'expediente'          => 'required|unique:tramitaciones,expediente,' . $tramitacion->id,
            'causal_id'           => 'nullable|exists:causales,id',
            'observaciones'       => 'nullable|string',
        ]);

        $tramitacion->update($validated);

        return redirect()
            ->route('tramitaciones.index')
            ->with('success', 'Tramitación actualizada correctamente.');
    }

    /**
     * Eliminar (soft delete)
     */
    public function destroy(Tramitacion $tramitacion)
    {
        $tramitacion->delete();

        return redirect()
            ->route('tramitaciones.index')
            ->with('success', 'Tramitación eliminada correctamente.');
    }
}
