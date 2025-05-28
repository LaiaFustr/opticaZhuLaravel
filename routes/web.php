<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpticaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ArticuloController;
use App\Models\User;

//use App/Http/Controllers/API/UserController;
//use App\Http\Controllers\UserController;

Route::view('/login', 'login')->name('logininicio');
Route::post('/login-usuario', [UserController::class, 'login'])->name('login');


Route::get('mostraropticas', [AdminController::class, 'mostrarOpticas'])->name('mostrarOpticas');

Route::get('home/citas', [CitaController::class, 'indexCitas'])->name('home');
/* Route::get('propietario/citas', function () {
    return view('citas');
})->name('citas'); */
Route::get('propietario/citas', [CitaController::class, 'indexCitas'])->name('citas');

Route::get('propietario/opticas', function () {
    return view('opticas');
})->name('opticas');

Route::get('propietario/opticasC', function () {
    return view('opticasCard');
});

Route::get('propietario/configInfo', function () {
    return view('configInfo');
});


Route::get("/propietario/proveedores/datos", [ProveedorController::class, "indexproveedor"])->name('indexproveedor');
Route::get("/propietario/proveedores/datatable", [ProveedorController::class, "getProveedores"])->name('getProveedores');
Route::get("/propietario/pedidos/datos", [PedidoController::class, "indexpedidos"])->name('indexpedidos');
Route::get("/propietario/pedidos/getPedidos", [PedidoController::class, "getPedidos"])->name('getPedidos');
Route::get("/propietario/pedidos/pdf", [PedidoController::class, "pdf"])->name("pedidos.pdf");

Route::get("/propietario/cerrarSesion", [EmpleadoController::class, "logout"])->name("cerrarSesion");

Route::get("/propietario/vertodoProveedores", function(){
    return view("proveedores");
})->name("proveedores");
Route::post("/propietario/crearProveedor", [ProveedorController::class, 'crearProveedor'])->name('crearProveedor');
Route::post("/propietario/editarProveedor", [ProveedorController::class, 'editarProveedor'])->name('editarProveedor');
Route::get("/propietario/borrarproveedor/{id}", [ProveedorController::class, 'borrarProveedor'])->name("borrarProveedor");
Route::post("/propietario/crearArticulo", [ProveedorController::class, 'crearArticulo'])->name('crearArticulo');
Route::post("/propietario/confirmarPedido", [PedidoController::class, 'confirmarPedido'])->name('confirmarPedido');
Route::post("/propietario/crearPedido", [PedidoController::class, 'crearPedido'])->name('crearPedido');
Route::post("/propietario/pagarPedido", [PedidoController::class, 'pagarPedido'])->name('crearPedido');
Route::get("/propietario/cancelarPedido/{id}", [PedidoController::class, 'cancelarPedido'])->name('cancelarPedido');
Route::get("/propietario/pdfpedido/{id}", [PedidoController::class, 'pdfpedido'])->name('pdfpedido');


Route::get('propietario/configCalendar', function () {
    return view('configCalendar');
})->name('configCalendar');


Route::get('propietario/configEmpleado', function () {
    return view('configEmpleado');
})->name('configEmpleado');

Route::view('propietario/perfilEmp', 'perfilEmp')->name('perfilEmp');


//Metodos Mostrar
Route::get('mostraropticas', [AdminController::class, 'mostrarOpticas'])->name('mostrarOpticas');
Route::get('opticas/mostrar', [OpticaController::class, 'index']);
Route::get('/propietario/opticas', [OpticaController::class, 'mostrar'])->name('opticas');
Route::get('/propietario/opticasC', [OpticaController::class, 'mostrarCard'])->name('opticasC');
Route::get('/propietario/opticaSelec/{id}', [OpticaController::class, 'opticaSelect'])->name('opticaSelec');
Route::get('propietario/opticaSelec/citas', [CitaController::class, 'citaOptica'])->name('citasS');
Route::get('/propietario/opticasS', [OpticaController::class, 'indexSelect'])->name('indexSelect');
Route::get('propietario/editarOptica/{id}', [OpticaController::class, 'cargarEdicion'])->name('editarOptica');

Route::get('/propietario/editInfo', function(){
    return view('editInfo');
})->name('editInfo');
//Route::get('/propietario/empleadosOp/{id}', [OpticaController::class, 'empleadosOptica'])->name('empleadosOp');

//Route::get('opticas', [OpticaController::class, 'index']);

//Route::get('', [OpticaController::class, 'guardar']);

//Metodos Insertar
Route::post('/propietario/insertarOptica', [OpticaController::class, 'guardar'])->name('insertarOptica');
Route::post('propietario/opticaSesion', [OpticaController::class, 'guardarSesion'])->name('opticaSesion');
Route::post('propietario/opticaSesionEdit/{id}', [OpticaController::class, 'guardarSesionEdit'])->name('opticaSesionEdit');

Route::post('propietario/insertarCliente', [ClienteController::class, 'guardar'])->name('insertarCliente');
Route::post('propietario/insertarEmpleado', [UserController::class, 'register'])->name('insertarEmpleado');
Route::post('propietario/userSesion', [UserController::class, 'guardarSesion'])->name('insertarEmpleado');



//Metodos Buscar
Route::get('propietario/buscarCli', [ClienteController::class, 'buscarCli'])->name('buscarCli');
Route::get('propietario/buscarEmp', [UserController::class, 'buscarEmpleadoLaravel'])->name('buscarEmpleado');
Route::get('propietario/buscarCli', [ClienteController::class,'buscarCli'])->name('buscarCli');

//Metodos Editar
Route::patch('propietario/desactivar/{id}', [UserController::class, 'desactivarEmpleado'])->name('desactivar');
Route::patch('propietario/activar/{id}', [UserController::class, 'activarEmpleado'])->name('activar');



//Route::get('propietario/buscarEmp', [EmpleadoController::class,'buscarEmpleado'])->name('buscarEmpleado');
/* Route::get('propietario/bloquesCalendario', [CalendarioController::class, 'bloquesHorariosCalendario']);
 */


// Ruta provisional de ficha (borrar cuando tenga enlace con citas)
/* Route::get('home/ficha', function () {
    return view('ficha');
});

})->name('ficha'); */

Route::post("eleccionFicha", [CitaController::class, 'eleccionFicha'])->name('eleccionFicha');
//Route::get("/home/fichalentilla", []);

Route::get(
    'home/citas/ficha/{idCita}',
    [CitaController::class, 'ficha']
)->name('ficha');
Route::get(
    'home/citas/fichalentilla/{idCita}',
    [CitaController::class, 'fichalentilla']
)->name('fichalentilla');

Route::get('propietario/proveedores/datos/{id}', [ProveedorController::class, 'proveedor'])->name('proveedor');
Route::get('propietario/detallespedido/{id}', [PedidoController::class, 'detallespedido'])->name('detallespedido');



// Redirigirá al login y dependiendo del rol irá a home o a propietario
Route::get('/', function () {
    return redirect()->route('logininicio');
});
//if rol optometrista
//if rol propietario
//$route = redirect()->route('propietario');



// Redirigirá al login y dependiendo del rol irá a home o a propietario
Route::post('/creaFicha', [FichaController::class, 'creaFicha'])->name('creaFicha');


Route::get("/citas/datos", [CitaController::class, 'getCitas'])->name('citasdatos');


Route::get("/propietario/cargarArticulos/{idOptica}/{idProveedor}", [ArticuloController::class, 'cargarArticulos']); 