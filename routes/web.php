<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\persona_fisica_controller;
use App\Http\Controllers\persona_moral_controller;

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

    return view('welcome');
});



Route::get('/aggCostumerMoral', function () {
    return view('agregarClientePersonaMoral');
});



<<<<<<< HEAD



Route::get('/FormAggPhisicalCostumer', [persona_fisica_controller::class,"mostrarPersonasFisicasGeneral"])->name('clienteSeleccionar.mostrar');

Route::post('/aggCostumers', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');


Route::post('/aggCompanies', [persona_moral_controller::class,"agregarClienteMoral"])->name('compañia.insertar');


Route::get('/detallePersonaMoral/{pkCompañia}/{vista}', [persona_moral_controller::class,"PersonasMoralEspecifica"])->name('personaMoral.detalle');


Route::post('/actualizarCompañia', [persona_moral_controller::class,"actualizarClienteMoral"])->name('personaMoral.actualizar');

Route::post('/actualizarCliente', [persona_fisica_controller::class,"actualizarClienteFisico"])->name('personaFisico.actualizar');




Route::match(['get', 'put'],'/bajaCompañia/{pkCompañia}', [persona_moral_controller::class,"bajaClienteMoral"])->name('personaMoral.baja');



Route::match(['get', 'put'],'/bajaCliente/{pkCliente}', [persona_fisica_controller::class,"bajarClienteFisico"])->name('personaFisca.baja');






Route::get('/phisicalCostumersList', [persona_fisica_controller::class,"listaPersonasMorales"])->name('clientesGenerales.mostrar');


Route::get('/morallCostumersList', [persona_moral_controller::class,"listaGenerarlPersonasMorales"])->name('clientesMoralGeneral.mostrar');




Route::get('/detallePersonaFisica/{pkCliente}/{vista?}', [persona_fisica_controller::class,"PersonasFisicaEspecifica"])->name('clienteFisico.detalle');
=======
Route::post('/aggNewPhisicalCostumer', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');

    return view('login');
});

>>>>>>> dfce1a13937a2d5888a3a56f06a4ba32f55b7156
