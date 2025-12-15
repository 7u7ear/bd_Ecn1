<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Mostrar listado de docentes
     */
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Guardar un nuevo docente
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rrhh_id'     => 'required|unique:docentes',
            'nombre'      => 'required|string|max:255',
            'apellido'    => 'required|string|max:255',
            'fechaNac'    => 'required|date',
            'dni'         => 'required|unique:docentes',
            'cuil'        => 'required|unique:docentes',
            'fichaCensal' => 'required|unique:docentes',
            'email'       => 'nullable|email|unique:docentes',
            'telefono'    => 'nullable|string|max:20',
        ]);

        Docente::create($validated);

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente.');
    }

    /**
     * Mostrar un docente específico
     */
    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Actualizar un docente
     */
public function update(Request $request, Docente $docente)
{
    $validated = $request->validate([
        'rrhh_id'     => 'required|unique:docentes,rrhh_id,' . $docente->id,
        'nombre'      => 'required|string|max:255',
        'apellido'    => 'required|string|max:255',
        'fechaNac'    => 'required|date',
        'dni'         => 'required|unique:docentes,dni,' . $docente->id,
        'cuil'        => 'required|digits_between:10,12|unique:docentes,cuil,' . $docente->id,
        'fichaCensal' => 'required|unique:docentes,fichaCensal,' . $docente->id,
        'email'       => 'nullable|email|unique:docentes,email,' . $docente->id,
        'telefono'    => 'nullable|string|max:20',
    ]);


        $docente->update($validated);

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente.');
    }

    /**
     * Eliminar un docente (soft delete)
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente.');
    }

    /**
     * Listar docentes eliminados (papelera)
     */
    public function trash()
    {
        $docentesEliminados = Docente::onlyTrashed()->get();
        return view('docentes.trash', compact('docentesEliminados'));
    }

    /**
     * Restaurar un docente eliminado
     */
    public function restore($id)
    {
        $docente = Docente::withTrashed()->findOrFail($id);
        $docente->restore();

        return redirect()->route('docentes.trash')
                         ->with('success', 'Docente restaurado correctamente.');
    }

    /**
     * Eliminar definitivamente un docente
     */
    public function forceDelete($id)
    {
        $docente = Docente::withTrashed()->findOrFail($id);
        $docente->forceDelete();

        return redirect()->route('docentes.trash')
                         ->with('success', 'Docente eliminado definitivamente.');
    }
}
