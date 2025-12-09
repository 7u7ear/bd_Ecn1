<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

// Ruta de inicio
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Recurso alumnos
Route::resource('alumnos', AlumnoController::class);
