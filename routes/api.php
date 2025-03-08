<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\OptometristaController;
use App\Http\Controllers\API\UserController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [UserController::class,'details']);
        Route::get('logout', [UserController::class,'logout']);
});

Route::get('/citas', [CitaController::class, 'index']);
Route::get('citas/{optica}', [CitaController::class, 'citaOptica']);
Route::get('/citascliente/{clientes}', [CitaController::class, 'citaCliente']);

Route::get('/admin', [AdminController::class, 'index']);
Route::put('/admin/actualizar/{id}', [AdminController::class, 'actualizar']);
Route::post('/admin/crear', [AdminController::class, 'crear']);
Route::delete('/admin/borrar/{id}', [AdminController::class, 'eliminar']);
Route::get('/adminbuscar/{id}', [AdminController::class, 'buscarAdmin']);

Route::get('/opticas', [OpticaController::class, 'index']);
Route::get('opticas/guardar' , [OpticaController::class, 'guardar']);
Route::get('/opticas/{id}', [OpticaController::class,'mostrarID']);
Route::get('/opticasporadmin/{idAdmin}', [OpticaController::class,'mostrarIDAdmin']);
Route::get('/opticasporhorario/{idHorario}', [OpticaController::class,'mostrarIDHorario']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/empleados', [UserController::class, 'empleados']);



Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');
Route::post('/crearCita', [CitaController::class, 'guardar'])->name('crearCita');

Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados');
Route::get('/empleados/{id}', [EmpleadoController::class, 'empleadoID']);
Route::get('/empleadosOptica', [UserController::class, 'empleadosOptica'])->name('empleadoOptica');
Route::get('users', [UserController::class, 'index'])->name('users');

Route::get('/auxiliares', [AuxiliarController::class, 'listado']);
Route::get('/auxiliaresoptica/{id}', [AuxiliarController::class,'listadoOptica']);
Route::get('/optometristas', [OptometristaController::class, 'listado']);
Route::get('/optometristasoptica/{id}', [OptometristaController::class,'listadoOptica']);

Route::get('/clientes', [ClienteController::class,'index'])->name('clientes');
Route::get('/citasCliente', [ClienteController::class,'citasCliente'])->name('citasCliente');
Route::delete('/borrarCliente', [ClienteController::class, 'borrarCli'])->name('borrarCli');


Route::get('/buscarCli', [ClienteController::class,'buscarCli'])->name('buscarCli');
Route::get('/citas', [CitaController::class, 'index'])->name('citas');
Route::get('/citasOptica', [CitaController::class, 'citaOptica'])->name('citasOptica');
Route::get('/citasOcupadas', [CitaController::class, 'citasOcupadas'])->name('citasOcupadas');
Route::delete('/borrarCita', [CitaController::class , 'borrarCita'])->name('borrarCita');

//Cambiar por id cuando este el login angular.
//Route::get('/empleadosOptica/{id}', [OpticaController::class, 'empleadosOptica'])->name('empleadosOptica');
//Route::get('/horarios', [HorarioController::class, 'index']->name('horarios'));

Route::post('/loginAngular', [UserController::class, 'loginAngular'])->name('login');

Route::get('/buscarEmpleadoApi', [UserController::class, 'buscarEmpleadoApi'])->name('buscarEmpleadoApi');
Route::patch('/guardarEmpleadoApi', [UserController::class, 'guardarEmpleadoApi'])->name('guardarEmpleadoApi');


