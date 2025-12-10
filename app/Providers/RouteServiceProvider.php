<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // 👈 IMPORTANTE

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Rutas generales
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Rutas de alumnos
        Route::middleware('web')
            ->group(base_path('routes/alumnos.php'));

        // Rutas de docentes
        Route::middleware('web')
            ->group(base_path('routes/docentes.php'));
    }
}
