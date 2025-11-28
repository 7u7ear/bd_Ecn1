<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::orderBy('apellido')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:alumnos,dni',
            'fecha_nacimiento' => 'required|date',
            'email' => 'nullable|email|unique:alumnos,email',
        ]);

        Alumno::create($validated);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente');
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:alumnos,dni,' . $alumno->id,
            'fecha_nacimiento' => 'required|date',
            'email' => 'nullable|email|unique:alumnos,email,' . $alumno->id,
        ]);

        $alumno->update($validated);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }
}
