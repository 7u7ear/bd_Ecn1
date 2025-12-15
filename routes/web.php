<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;

// Inicio
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Docentes – soft delete
Route::get('/docentes/trash', [DocenteController::class, 'trash'])
     ->name('docentes.trash');

Route::post('/docentes/{id}/restore', [DocenteController::class, 'restore'])
     ->name('docentes.restore');

Route::delete('/docentes/{id}/forceDelete', [DocenteController::class, 'forceDelete'])
     ->name('docentes.forceDelete');

// CRUD docentes
Route::resource('docentes', DocenteController::class);

// Tramitaciones (archivo separado)
require __DIR__.'/tramitaciones.php';


