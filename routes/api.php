<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::get('/opticas', [OpticaController::class, 'index']);
Route::put('/admin/actualizar/{id}', [AdminController::class, 'actualizar']);
Route::post('/admin/crear', [AdminController::class, 'crear']);
Route::delete('/admin/borrar/{id}', [AdminController::class, 'eliminar']);
Route::get('/admin/buscar/{id}', [AdminController::class, 'mostrar']);
Route::get('opticas/guardar' , [OpticaController::class, 'guardar']);
Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');
Route::post('/propietario/insertarHorario', [HorarioController::class, 'guardar'])->name('insertarHorario');
Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados');
Route::get('/clientes', [ClienteController::class,'index'])->name('clientes');
Route::get('/buscarCli', [ClienteController::class,'buscarCli'])->name('buscarCli');

//Route::get('/horarios', [HorarioController::class, 'index']->name('horarios'));
