<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\persona_fisica_controller;
use App\Http\Controllers\persona_moral_controller;
use App\Http\Controllers\pendiente_controller;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\solicitud_controller;
use App\Http\Controllers\documento_controller;

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


Route::get('/aggDocumentsForm', function () {
    return view('agregaDocumentosClientes');
});

Route::post('/aggPeticion', [solicitud_controller::class,"crearSolicitud"])->name('solicitud.insertar');


Route::get('/generalListQueriesEmployees', [solicitud_controller::class,"listaGeneralPeticiones"])->name('solicitud.historial');

Route::get('/formularioAgregarDocumentosCliente/{pkCliente}', [documento_controller::class,"formularioAgregarArchivo"])->name('documento.formulario');
Route::get('/formularioAgregarDocumentosCompañia/{pkCompañia}', [documento_controller::class,"formularioAgregarArchivoCompañia"])->name('documentoCompañia.formulario');



Route::post('/agregarDocumentoCliente', [documento_controller::class,"agregarDocumentoCliente"])->name('documentoCliente.agregar');

Route::post('/agregarDocumentoCompañia', [documento_controller::class,"agregarDocumentoCompañia"])->name('documentoCompañia.agregar');




Route::get('/historialCompletoDocumentos', [documento_controller::class,"listaGeneralDocumentos"])->name('documentoCliente.historial');










Route::get('/formularioPendienteCompañia/{pkEmpleado}', [persona_fisica_controller::class,"CompañiaEspecificaFormulario"])->name('pendienteclientecompañiaespecifica.formulario');


Route::get('/formularioPendienteClienteCompañia/{pkEmpleado}', [persona_fisica_controller::class,"compañiasYpersonasEmpleadoFormulario"])->name('pendienteclientecompañia.formulario');

Route::post('/agregarClienteCompañia', [persona_fisica_controller::class,"repartirClienteFisicoMoral"])->name('empleadoSeleccionarClienteCompañia.agregar');




Route::get('/FormAggPhisicalCostumer', [persona_fisica_controller::class,"mostrarPersonasFisicasGeneral"])->name('clienteSeleccionar.mostrar');


Route::post('/aggDocuments', [persona_fisica_controller::class,"AgregarDocumentosCliente"])->name('clientesDocumentos.subir');

Route::post('/aggCostumers', [persona_fisica_controller::class,"agregarClienteFisico"])->name('cliente.insertar');


Route::post('/aggCompanies', [persona_moral_controller::class,"agregarClienteMoral"])->name('compañia.insertar');


Route::get('/detallePersonaMoral/{pkCompañia}/{vista?}', [persona_moral_controller::class,"PersonasMoralEspecifica"])->name('personaMoral.detalle');

Route::get('/seleccionarEmpleadooCompañia/{pkEmpleado}', [persona_fisica_controller::class,"CompañiasyClientesElegir"])->name('personaSeleccionarCompañiaCliente.select');


Route::get('/detalleClientesSeleccionadosEmployeeX/{pkEmpleado}/{vista?}', [persona_fisica_controller::class,"compañiasYpersonasEmpleado"])->name('personaSeleccionarCompañiaCliente.detalle');




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

Route::get('/dashboardAdmin', [AsistenciaController::class, 'mostrarAsistencia']);


Route::post('/inicioSesion', [empleadOController::class, 'login'])->name('inicioSesion');


Route::get('/historialPendientesEmployees', [pendiente_controller::class,"listaHistorialPendientesClientes"])->name('pendienteEmpleados.historial');

Route::get('/historialPendientesCompanies', [pendiente_controller::class,"listaHistorialPendientesCompañias"])->name('pendienteCompañia.historial');




Route::post('/agregarPendientesEmployee', [pendiente_controller::class,"agregarPendiente"])->name('pendienteEmpleado.agregar');
Route::post('/agregarPendientesCostumer', [pendiente_controller::class,"agregarPendienteCliente"])->name('pendienteCliente.agregar');

Route::post('/agregarPendientesCompany', [pendiente_controller::class,"agregarPendienteCompañia"])->name('pendienteCompañia.agregar');


Route::get('/listaPendienteEmployee/{pkEmpleado}', [pendiente_controller::class,"listaPendientesEmpleadosPersonales"])->name('pendienteEmpleadoPersonal.mostrar');

Route::get('/listaPendienteEmployeeGeneral', [pendiente_controller::class,"listaPendientesEmpleadosGeneral"])->name('pendienteEmpleadoHistorial.mostrar');


Route::get('/agregarPendientesEmployee', [empleadoController::class,"formularioAgregarPendienteEmployees"])->name('pendienteEmpleado.agregar');
Route::post('/aggNewEmployee', [empleadoController::class,"agregar"])->name('empleado.agregar');
Route::get('/allEmployees', [empleadoController::class,"mostrarEmpleados"])->name('empleado.mostrar');
Route::post('/updateEmployee', [empleadoController::class,"actualizar"])->name('empleado.actualizar');
Route::post('/deleteEmployee', [empleadoController::class,"baja"])->name('empleado.baja');
Route::get('/idEmployee/{pkEmpleado}/{vista?}', [empleadoController::class,"mostrarEmpleadoPorId"])->name('empleado.mostrarPorId');

