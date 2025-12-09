@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="text-center">
        <h1>Bienvenido al sistema bd_ecn1</h1>
        <p>Este es tu punto de inicio. Desde aquí podés navegar a las secciones principales del sistema.</p>

        <a href="{{ route('alumnos.index') }}" class="btn btn-primary mt-3">
            📘 Listado de Alumnos
        </a>
    </div>
@endsection


