<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\persona_fisica_controller;


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


Route::get('/FormAggPhisicalCostumer', function () {
    return view('agregarClientePersonaFisica');
});

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

Route::post('/inicioSesion', [empleadOController::class, 'login'])->name('inicioSesion');
Route::post('/aggNewEmployee', [empleadoController::class,"agregar"])->name('empleado.agregar');
Route::get('/allEmployees', [empleadoController::class,"mostrarEmpleados"])->name('empleado.mostrar');
Route::post('/updateEmployee', [empleadoController::class,"actualizar"])->name('empleado.actualizar');
Route::post('/deleteEmployee', [empleadoController::class,"baja"])->name('empleado.baja');
Route::get('/idEmployee/{pkEmpleado}/{vista?}', [empleadoController::class,"mostrarEmpleadoPorId"])->name('empleado.mostrarPorId');




