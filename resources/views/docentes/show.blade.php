@extends('layouts.app')

@section('title', 'Ficha del Docente')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2>Ficha del Docente</h2>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID RRHH</dt>
                <dd class="col-sm-9">{{ $docente->rrhh_id }}</dd>

                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9">{{ $docente->nombre }}</dd>

                <dt class="col-sm-3">Apellido</dt>
                <dd class="col-sm-9">{{ $docente->apellido }}</dd>

                <dt class="col-sm-3">Fecha de Nacimiento</dt>
                <dd class="col-sm-9">{{ $docente->fechaNac }}</dd>

                <dt class="col-sm-3">DNI</dt>
                <dd class="col-sm-9">{{ $docente->dni }}</dd>

                <dt class="col-sm-3">CUIL</dt>
                <dd class="col-sm-9">{{ $docente->cuil }}</dd>

                <dt class="col-sm-3">Ficha Censal</dt>
                <dd class="col-sm-9">{{ $docente->fichaCensal }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $docente->email }}</dd>
            </dl>
        </div>

    </div>
@endsection
