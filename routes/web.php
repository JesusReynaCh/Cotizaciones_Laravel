<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CotizacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('cotizaciones', CotizacionController::class);

// Ruta para PDF de cotizaciones
Route::get('/cotizaciones/{cotizacion}/pdf', [CotizacionController::class, 'generarPDF'])->name('cotizaciones.pdf');