@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="text-center">
        <h4>Bienvenido al sistema bd_ecn1</h4>
        <p>Este es tu punto de inicio.</p>

        <a href="{{ route('alumnos.index') }}" class="btn btn-primary mt-3">
            📘  Alumnos
        </a>&nbsp; &nbsp;&nbsp; &nbsp;<a href="{{ route('docentes.index') }}" class="btn btn-primary mt-3 docentes-btn">
    🎓 Docentes
</a>

                       </div>
@endsection


