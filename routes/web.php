<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaparecidoController;
use App\Http\Controllers\OrganizationController;

// Página de inicio
Route::get('/', function () {
    return view('inicio');
});



// Resource controller para desaparecidos
Route::resource('desaparecidos', DesaparecidoController::class)
    ->only(['index', 'create', 'store', 'update', 'destroy', 'edit']);

// Listar aparecidos (ruta especial fuera del resource)
Route::get(
    '/desaparecidos/listaAparecidos',
    [DesaparecidoController::class, 'mostrar_info_aparecidos']
)->name('aparecidos.informacion');

// Toggle rol_id (ruta especial)
Route::put(
    '/desaparecidos/{id}/toggle',
    [DesaparecidoController::class, 'toggleEstado']
)->name('desaparecidos.toggle');


//Organizaciones
Route::resource('zonas', OrganizationController::class)
    ->only(['index', 'create', 'store', 'update', 'destroy', 'edit']);
