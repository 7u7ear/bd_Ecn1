<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;

Route::resource('docentes', DocenteController::class);

// Ruta para ver la lista de docentes eliminados
Route::get('/docentes/trash', [DocenteController::class, 'trash'])
     ->name('docentes.trash');

     // Restaurar
Route::post('/docentes/{id}/restore', [DocenteController::class, 'restore'])
     ->name('docentes.restore');

// Eliminar definitivo
Route::delete('/docentes/{id}/forceDelete', [DocenteController::class, 'forceDelete'])
     ->name('docentes.forceDelete');
