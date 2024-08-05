<?php

use Illuminate\Support\Facades\Route;

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

    return view('welcome');
});


Route::get('/FormAggPhisicalCostumer', function () {
    return view('agregarClientePersonaFisica');
});



Route::post('/aggNewPhisicalCostumer', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');

    return view('login');
});

