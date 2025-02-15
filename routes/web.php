<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ClienteController;



//Hola

Route::get('home', function() {
    return view('app');
});

Route::get('propietario', function() {
    return view('app');
});

Route::get('home/citas', function(){
    return view('citas');
});

Route::get('mostraropticas', [AdminController::class, 'mostrarOpticas'])->name('mostrarOpticas');


Route::get('propietario/citas', function(){
    return view('citas');
});

Route::get('propietario/opticas', function(){
    return view('opticas');
});

Route::get('propietario/opticasC', function(){
    return view('opticasCard');
});
Route::get('mostraropticas', [AdminController::class, 'mostrarOpticas'])->name('mostrarOpticas');

Route::get('propietario/configInfo', function(){
    return view('configInfo');
});

Route::get('propietario/configCalendar', function(){
    return view('configCalendar');
})->name('configCalendar');


Route::get('propietario/configEmpleado', function(){
    return view('configEmpleado');
})->name('configEmpleado');

Route::get('/propietario/opticas', [OpticaController::class, 'mostrar'])->name('opticas');
Route::get('/propietario/opticasC', [OpticaController::class, 'mostrarCard'])->name('opticasC');


//Route::get('opticas', [OpticaController::class, 'index']);

Route::get('' , [OpticaController::class, 'guardar']);

Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');

Route::post('propietario/insertarHorario', [HorarioController::class, 'guardar'])->name('insertarHorario');

Route::post('propietario/opticaSesion', [OpticaController::class, 'guardarSesion'])->name('opticaSesion');

Route::get('opticas/mostrar' , [OpticaController::class, 'index']);

Route::get('propietario/buscarCli', [ClienteController::class,'buscarCli'])->name('buscarCli');

Route::post('propietario/insertarCliente', [ClienteController::class, 'guardar'])->name('insertarCliente');

