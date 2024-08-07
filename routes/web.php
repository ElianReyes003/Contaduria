<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\persona_fisica_controller;
use App\Http\Controllers\persona_moral_controller;
use App\Http\Controllers\AsistenciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});



Route::get('/aggCostumerMoral', function () {
    return view('agregarClientePersonaMoral');
});



Route::post('/agregarClienteCompañia', [persona_fisica_controller::class,"repartirClienteFisicoMoral"])->name('empleadoSeleccionarClienteCompañia.agregar');

Route::get('/FormAggPhisicalCostumer', [persona_fisica_controller::class,"mostrarPersonasFisicasGeneral"])->name('clienteSeleccionar.mostrar');

Route::post('/aggCostumers', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');


Route::post('/aggCompanies', [persona_moral_controller::class,"agregarClienteMoral"])->name('compañia.insertar');


Route::get('/detallePersonaMoral/{pkCompañia}/{vista}', [persona_moral_controller::class,"PersonasMoralEspecifica"])->name('personaMoral.detalle');

Route::get('/seleccionarEmpleadooCompañia/{pkEmpleado}', [persona_fisica_controller::class,"CompañiasyClientesElegir"])->name('personaSeleccionarCompañiaCliente.select');


Route::get('/detalleClientesSeleccionadosEmployeeX/{pkEmpleado}', [persona_fisica_controller::class,"compañiasYpersonasEmpleado"])->name('personaSeleccionarCompañiaCliente.detalle');






Route::post('/actualizarCompañia', [persona_moral_controller::class,"actualizarClienteMoral"])->name('personaMoral.actualizar');

Route::post('/actualizarCliente', [persona_fisica_controller::class,"actualizarClienteFisico"])->name('personaFisico.actualizar');




Route::match(['get', 'put'],'/bajaCompañia/{pkCompañia}', [persona_moral_controller::class,"bajaClienteMoral"])->name('personaMoral.baja');



Route::match(['get', 'put'],'/bajaCliente/{pkCliente}', [persona_fisica_controller::class,"bajarClienteFisico"])->name('personaFisca.baja');






Route::get('/phisicalCostumersList', [persona_fisica_controller::class,"listaPersonasMorales"])->name('clientesGenerales.mostrar');


Route::get('/morallCostumersList', [persona_moral_controller::class,"listaGenerarlPersonasMorales"])->name('clientesMoralGeneral.mostrar');




Route::get('/detallePersonaFisica/{pkCliente}/{vista?}', [persona_fisica_controller::class,"PersonasFisicaEspecifica"])->name('clienteFisico.detalle');


Route::post('/aggNewPhisicalCostumer', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');



Route::post('/aggNewPhisicalCostumer', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');




//---------------------REEDIRECCIPON USUARIOS----------------------//
Route::get('/dashboardAdmin', function () {
    return view('paginaInicio');
});


Route::get('/dashboardCliente', function () {
    return view('detalleCliente');
});

Route::get('/dashboardEmpleado', function () {
    return view('empleadoPerfil');
});

//---------------------EMPLEADOS----------------------//
Route::get('/RegistrarEmpleado', function () {
    return view('agregarEmpleado');
})->name('formEmpleado');

Route::get('/listaEmpleados', function () {
    return view('listaEmpleado');
});

Route::get('/justificarTardanza', function () {
    return view('justificarTardanza');
});

Route::post('/guardarJustificacion', [AsistenciaController::class, 'guardarJustificacion']);

Route::post('/inicioSesion', [empleadOController::class, 'login'])->name('inicioSesion');
Route::post('/aggNewEmployee', [empleadoController::class,"agregar"])->name('empleado.agregar');
Route::get('/allEmployees', [empleadoController::class,"mostrarEmpleados"])->name('empleado.mostrar');
Route::post('/updateEmployee', [empleadoController::class,"actualizar"])->name('empleado.actualizar');
Route::post('/deleteEmployee', [empleadoController::class,"baja"])->name('empleado.baja');
Route::get('/idEmployee/{pkEmpleado}/{vista?}', [empleadoController::class,"mostrarEmpleadoPorId"])->name('empleado.mostrarPorId');

