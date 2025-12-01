<?php

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

use App\Http\Controllers\AlumnoController;

Route::resource('alumnos', AlumnoController::class);


use Illuminate\Support\Facades\Route;

