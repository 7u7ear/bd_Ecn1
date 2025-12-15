<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramitacionController;


Route::resource('tramitaciones', TramitacionController::class, [
    'parameters' => ['tramitaciones' => 'tramitacion']
]);
