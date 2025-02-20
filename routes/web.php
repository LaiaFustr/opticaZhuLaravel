<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CalendarioController;






/*Route::get('/', function(){
    redirect()->route('home/');
});*/
//Rutas de la vista

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

Route::get('propietario/configInfo', function(){
    return view('configInfo');
});

Route::get('propietario/configCalendar', function(){
    return view('configCalendar');
})->name('configCalendar');


Route::get('propietario/configEmpleado', function(){
    return view('configEmpleado');
})->name('configEmpleado');

Route::view('propietario/perfilEmp', 'perfilEmp')->name('perfilEmp');


//Metodos Mostrar
Route::get('mostraropticas', [AdminController::class, 'mostrarOpticas'])->name('mostrarOpticas');
Route::get('opticas/mostrar' , [OpticaController::class, 'index']);
Route::get('/propietario/opticas', [OpticaController::class, 'mostrar'])->name('opticas');
Route::get('/propietario/opticasC', [OpticaController::class, 'mostrarCard'])->name('opticasC');

//Route::get('opticas', [OpticaController::class, 'index']);

Route::get('' , [OpticaController::class, 'guardar']);

//Metodos Insertar
Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');
Route::post('propietario/insertarHorario', [HorarioController::class, 'guardar'])->name('insertarHorario');
Route::post('propietario/opticaSesion', [OpticaController::class, 'guardarSesion'])->name('opticaSesion');
Route::post('propietario/insertarCliente', [ClienteController::class, 'guardar'])->name('insertarCliente');
Route::post('propietario/empleadoSesion', [EmpleadoController::class, 'guardarSesion'])->name('insertarEmpleado');


//Metodos Buscar
Route::get('propietario/buscarCli', [ClienteController::class,'buscarCli'])->name('buscarCli');
Route::get('propietario/buscarEmp', [EmpleadoController::class,'buscarEmpleado'])->name('buscarEmpleado');
/* Route::get('propietario/bloquesCalendario', [CalendarioController::class, 'bloquesHorariosCalendario']);
 */


// Ruta provisional de ficha (borrar cuando tenga enlace con citas)
Route::get('home/ficha', function(){
    return view('ficha');
});
