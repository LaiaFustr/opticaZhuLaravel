<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CitasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/citas', [CitasController::class, 'index']);

Route::put('/admin/actualizar/{id}', [AdminController::class, 'actualizar']);
Route::post('/admin/crear', [AdminController::class, 'crear']);
Route::delete('/admin/borrar/{id}', [AdminController::class, 'eliminar']);
Route::get('/admin/buscar/{id}', [AdminController::class, 'mostrar']);

Route::get('/opticas', [OpticaController::class, 'index']);
Route::get('opticas/guardar' , [OpticaController::class, 'guardar']);
Route::get('/opticas/{id}', [OpticaController::class,'mostrarID']);
Route::get('/opticasporadmin/{idAdmin}', [OpticaController::class,'mostrarIDAdmin']);
Route::get('/opticasporhorario/{idHorario}', [OpticaController::class,'mostrarIDHorario']);

Route::get('/horarios', [HorarioController::class,'index']);
Route::get('/horarios/{id}', [HorarioController::class,'mostrarID']);
Route::get('/horariosporadmin/{idAdmin}', [HorarioController::class,'mostrarIDAdmin']);

Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');
Route::post('/propietario/insertarHorario', [HorarioController::class, 'guardar'])->name('insertarHorario');