@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0">Listado de Alumnos</h1>
        <a href="#" class="btn btn-primary">Nuevo alumno</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Pérez</td>
                <td>1º A</td>
                <td>
                    <button class="btn btn-sm btn-info">Ver</button>
                    <button class="btn btn-sm btn-warning">Editar</button>
                </td>
            </tr>
            <tr>
                <td>María López</td>
                <td>2º B</td>
                <td>
                    <button class="btn btn-sm btn-info">Ver</button>
                    <button class="btn btn-sm btn-warning">Editar</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
