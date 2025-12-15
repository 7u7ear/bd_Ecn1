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
                <dd class="col-sm-9">{{ $docente->fechaNac?->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">DNI</dt>
                <dd class="col-sm-9">{{ $docente->dni }}</dd>

                <dt class="col-sm-3">CUIL</dt>
                <dd class="col-sm-9">{{ $docente->cuil }}</dd>

                <dt class="col-sm-3">Ficha Censal</dt>
                <dd class="col-sm-9">{{ $docente->fichaCensal }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $docente->email }}</dd>

                <dt class="col-sm-3">Teléfono</dt>
                <dd class="col-sm-9">{{ $docente->telefono }}</dd>
            </dl>
            <div class="d-flex justify-content-end">
                <a href="{{ route('docentes.edit', $docente) }}"
                    class="btn btn-success btn-sm d-flex align-items-center justify-content-center">
                    <span>Editar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square ms-2" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 0 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                </a>&nbsp; &nbsp;

                <a href="{{ route('docentes.index') }}" class="btn btn-danger">Cancelar <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg></a>
            </div>

        </div>


    @endsection
