<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Compañia;

use App\Models\clienteClientes;
use App\Models\ClienteCompañia;
use App\Models\Domicilio;
use App\Models\Empleado;

use App\Models\EmpleadoRelacionCliente;
use App\Models\EmpleadoRelacionCompañia;

use App\Models\documentosClientes;
use App\Models\pendienteCliente;
use Illuminate\Support\Facades\DB;

class persona_fisica_controller extends Controller
{


    public function AgregarDocumentosCliente(Request $req){

        // Recibe el archivo de firma electrónica desde la solicitud
        $firmaElectronicaFile = $req->file('firmaElectronica');

        dd($firmaElectronicaFile);
        // Crea una nueva instancia de documentosClientes
        $firmaElectronica = new documentosClientes();
        
        // Almacena el nombre original del archivo
        $firmaElectronica->documentoCliente = $firmaElectronicaFile->getClientOriginalName();
        
        // Almacena las fechas de expedición y vencimiento
        $firmaElectronica->fechaExpedicion = $req->fechaExpedicionFirma;
        $firmaElectronica->fechaVencimiento = $req->fechaVencimientoFirma;
        
        // Almacena el archivo en la carpeta 'public' y guarda la ruta
        $ruta = $firmaElectronicaFile->store('public');
        $firmaElectronica->rutaDccumentoCliente = $ruta;
        /*
        // Asigna las claves foráneas y otros atributos
        $firmaElectronica->fkCliente = $cliente->pkCliente;
        $firmaElectronica->fkTipoDocumento = 1; // Asegúrate de que el tipo de documento sea correcto
        $firmaElectronica->estatusProceso = 1;
        $firmaElectronica->estatusDocumentoCliente = 1;
        
        // Guarda el objeto en la base de datos
        $firmaElectronica->save();
*/

/*
        $factura = new documentosClientes();


        $facturaName=$req->file('factura') ;
         $factura->documentoCliente=   $facturaName->getClientOriginalName();
         $factura->fechaExpedicion= $req->fechaExpedicionFirma;
         $factura->fechaVencimiento= $req->fechaVencimientoFirma;
        $ruta =$facturaName->store('public');
         $factura->rutaDccumentoCliente=$ruta;
         $factura->fkCliente=$cliente->pkCliente;
         $factura->fkTipoDocumento=2;
         $factura->estatusProceso=1;
         $factura->estatusDocumentoCliente=1;
         $factura->save();


        $estadoDeCuenta = new documentosClientes();


        $estadoDeCuentaName=$req->file('estadoCuenta') ;
        $estadoDeCuenta ->documentoCliente=   $estadoDeCuentaName->getClientOriginalName();
        $estadoDeCuenta ->fechaExpedicion= $req->fechaExpedicionFirma;
        $estadoDeCuenta ->fechaVencimiento= $req->fechaVencimientoFirma;
       $ruta =$estadoDeCuentaName->store('public');
        $estadoDeCuenta ->rutaDccumentoCliente=$ruta;
        $estadoDeCuenta ->fkCliente=$cliente->pkCliente;
        $estadoDeCuenta ->fkTipoDocumento=3;
        $estadoDeCuenta ->estatusProceso=1;
        $estadoDeCuenta ->estatusDocumentoCliente=1;
        $estadoDeCuenta ->save();


        $papelesDeTrabajo = new documentosClientes();

        $papelesDeTrabajoName=$req->file('papelesDeTrabajo') ;
         $papelesDeTrabajo ->documentoCliente=    $papelesDeTrabajoName->getClientOriginalName();
         $papelesDeTrabajo ->fechaExpedicion= $req->fechaExpedicionFirma;
         $papelesDeTrabajo ->fechaVencimiento= $req->fechaVencimientoFirma;
        $ruta = $papelesDeTrabajoName->store('public');
         $papelesDeTrabajo ->rutaDccumentoCliente=$ruta;
         $papelesDeTrabajo ->fkCliente=$cliente->pkCliente;
         $papelesDeTrabajo ->fkTipoDocumento=4;
         $papelesDeTrabajo ->estatusProceso=1;
         $papelesDeTrabajo ->estatusDocumentoCliente=1;
         $papelesDeTrabajo ->save();



        if ($req->hasFile('documentos')) {
            foreach ($req->file('documentos') as $documento) {
                $nombreDocumento = $documento->getClientOriginalName();
                $ruta = $documento->store('public');// Crear un nuevo documento asociado al cliente
                $nuevoDocumento = new documentosClientes();
                $nuevoDocumento->documentoCliente = $nombreDocumento;
                $nuevoDocumento->fkTipoDocumento=5; 
                $nuevoDocumento ->estatusProceso=1;
                $nuevoDocumento ->estatusDocumentoCliente=1;// Asegúrate de tener el nombre correcto del campo
                $nuevoDocumento->save();
            }
        }

*/


    }







    public function agregarClienteFisico(Request $req)
    {  


      
        $firmaElectronicaFile = $req->file('firmaElectronica');

       
        $persona = new Persona();
        $persona->nombre = $req->nombre;
        $persona->apellidoPaterno = $req->apellidoPaterno;
        $persona->apellidoMaterno = $req->apellidoMaterno;
        $persona->save();

      

        $cliente = new Cliente();

        $cantidadDigitos = 6; // Cantidad de dígitos que deseas tener en total (incluyendo el pkCompra)
        $codigoCliente = str_pad($persona->pkPersona, $cantidadDigitos, '0', STR_PAD_LEFT);
        $cliente->codigoCliente = $codigoCliente;
        $cliente->rfc = $req->rfc;
        $cliente->curp = $req->curp;
        $cliente->fecha_inicio_operaciones= $req->fecha_inicio_operaciones;
        $cliente->fecha_ultimo_cambio_de_estado= $req->fecha_ultimo_cambio_de_estado;
        $cliente->nombreUsuarioCliente= $req->nombreUsuarioCliente;
        $cliente->contraseñaCliente= $req->contraseñaCliente;
        $cliente->estatusPatron= $req->estatusPatron;
        $cliente->estatusCliente= 1;
        $cliente->fkPersona= $persona->pkPersona;
        $cliente->save();



        $personaArray = $req->input('persona');

       

        for ($i = 0; $i < count( $personaArray ); $i++) {
            $personaId =  $personaArray [$i];
            $personaRelacionada=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
            ->select('persona.*', 'cliente.*')->where('cliente.fkPersona', '=', $personaId )->first();

            $nuevaRelacionPersona = new clienteClientes();
            $nuevaRelacionPersona ->fkCliente1= $cliente->pkCliente;
            $nuevaRelacionPersona ->fkCliente2=$personaRelacionada->pkCliente;
            $nuevaRelacionPersona ->estatusClienteClientes=1;
            $nuevaRelacionPersona->save();
        }


        $compañiaArray = $req->input('compañia');


        for ($i = 0; $i < count( $compañiaArray ); $i++) {
            $compañiaId =  $compañiaArray [$i];
            $compañiaRelacionada = Compañia::where('pkCompañia', $compañiaId)->first();



            $nuevaCompañia = new ClienteCompañia();
            $nuevaCompañia ->fkCliente= $cliente->pkCliente;
            $nuevaCompañia ->fkCompañia=$compañiaRelacionada->pkCompañia;
            $nuevaCompañia ->estatusCompañiaCliente=1;
            $nuevaCompañia->save();
        }

        $domicilio = new Domicilio();
        $domicilio->codigoPostal = $req->codigoPostal ;
        $domicilio->tipoViabilidad = $req->tipoViabilidad;
        $domicilio->nombreViabilidad= $req->nombreViabilidad;
        $domicilio->numeroInterior= $req->numeroInterior;
        $domicilio->colonia=$req->colonia;
        $domicilio->localidad= $req->localidad;
        $domicilio->municipio= $req->municipio;
        $domicilio->entidadFederativa= $req->entidadFederativa;
        $domicilio->entreCalle= $req->entreCalle;
        $domicilio->yCalle= $req->yCalle;
        $domicilio->correoElectronico= $req->correoElectronico;
        $domicilio->fkCliente= $cliente->pkCliente;
        $domicilio->estatusDomicilio= 1;
        $domicilio->save();


        // Recibe el archivo de firma electrónica desde la solicitud
        $firmaElectronicaFile = $req->file('firmaElectronica');

        // Crea una nueva instancia de documentosClientes
        $firmaElectronica = new documentosClientes();
        
        // Almacena el nombre original del archivo
        $firmaElectronica->documentoCliente = $firmaElectronicaFile->getClientOriginalName();
        
        // Almacena las fechas de expedición y vencimiento
        $firmaElectronica->fechaExpedicion = $req->fechaExpedicionFirma;
        $firmaElectronica->fechaVencimiento = $req->fechaExpedicionVencimientoFirma;
        
        // Almacena el archivo en la carpeta 'public' y guarda la ruta
        $ruta = $firmaElectronicaFile->store('public');
        $firmaElectronica->rutaDocumentoCliente = $ruta;
        
        // Asigna las claves foráneas y otros atributos
        $firmaElectronica->fkCliente = $cliente->pkCliente;
        $firmaElectronica->fkTipoDocumento = 1; // Asegúrate de que el tipo de documento sea correcto
        $firmaElectronica->estatusProceso = 1;
        $firmaElectronica->estatusDocumentoCliente = 1;
        
        // Guarda el objeto en la base de datos
        $firmaElectronica->save();



        $factura = new documentosClientes();


        $facturaName=$req->file('factura') ;
         $factura->documentoCliente=   $facturaName->getClientOriginalName();
         $factura->fechaExpedicion= $req->fechaExpedicionFactura;
         $factura->fechaVencimiento= $req->fechaExpedicionVencimientoFactura;
        $ruta =$facturaName->store('public');
         $factura->rutaDocumentoCliente=$ruta;
         $factura->fkCliente=$cliente->pkCliente;
         $factura->fkTipoDocumento=2;
         $factura->estatusProceso=1;
         $factura->estatusDocumentoCliente=1;
         $factura->save();


        $estadoDeCuenta = new documentosClientes();


        $estadoDeCuentaName=$req->file('estadoCuenta') ;
        $estadoDeCuenta ->documentoCliente=   $estadoDeCuentaName->getClientOriginalName();
        $estadoDeCuenta ->fechaExpedicion= $req->fechaExpedicionEstadoCuenta;
        $estadoDeCuenta ->fechaVencimiento= $req->fechaVencimientoEstadoCuenta;
       $ruta =$estadoDeCuentaName->store('public');
        $estadoDeCuenta ->rutaDocumentoCliente=$ruta;
        $estadoDeCuenta ->fkCliente=$cliente->pkCliente;
        $estadoDeCuenta ->fkTipoDocumento=3;
        $estadoDeCuenta ->estatusProceso=1;
        $estadoDeCuenta ->estatusDocumentoCliente=1;
        $estadoDeCuenta ->save();


        $papelesDeTrabajo = new documentosClientes();

        $papelesDeTrabajoName=$req->file('papelesDeTrabajo') ;
         $papelesDeTrabajo ->documentoCliente=    $papelesDeTrabajoName->getClientOriginalName();
         $papelesDeTrabajo ->fechaExpedicion= $req->fechaExpedicionPapelesTrabajo;
         $papelesDeTrabajo ->fechaVencimiento= $req->fechaVencimientoPapelesTrabajo;
        $ruta = $papelesDeTrabajoName->store('public');
         $papelesDeTrabajo ->rutaDocumentoCliente=$ruta;
         $papelesDeTrabajo ->fkCliente=$cliente->pkCliente;
         $papelesDeTrabajo ->fkTipoDocumento=4;
         $papelesDeTrabajo ->estatusProceso=1;
         $papelesDeTrabajo ->estatusDocumentoCliente=1;
         $papelesDeTrabajo ->save();



        if ($req->hasFile('documentos')) {
            foreach ($req->file('documentos') as $documento) {
                $nombreDocumento = $documento->getClientOriginalName();
                $ruta = $documento->store('public');// Crear un nuevo documento asociado al cliente
                $nuevoDocumento = new documentosClientes();
                $nuevoDocumento->documentoCliente = $nombreDocumento;
                $nuevoDocumento ->fechaExpedicion= now();
                $nuevoDocumento->fkTipoDocumento=5;
                $nuevoDocumento ->rutaDocumentoCliente=$ruta;
                $nuevoDocumento ->fkCliente=$cliente->pkCliente;
                $nuevoDocumento ->estatusProceso=1;
                $nuevoDocumento ->estatusDocumentoCliente=1;// Asegúrate de tener el nombre correcto del campo
                $nuevoDocumento->save();
            }
        }

        
    }


    public function actualizarClienteFisico(Request $req)
    {  
    

      $datosPersona=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
      ->select('persona.*')->where('cliente.pkCliente', '=',  $req->input('pkCliente') )->first();


      $datosPersona->nombre = $req->nombre;
      $datosPersona->apellidoPaterno = $req->apellidoPaterno;
      $datosPersona->apellidoMaterno = $req->apellidoMaterno;
      $datosPersona->save();

      

      $datosCliente= Cliente::select( 'cliente.*')->where('cliente.pkCliente', '=',  $req->input('pkCliente') )->first();

        $datosCliente->rfc = $req->rfc;
        $datosCliente->curp = $req->curp;
        $datosCliente->fecha_inicio_operaciones= $req->fecha_inicio_operaciones;
        $datosCliente->fecha_ultimo_cambio_de_estado= $req->fecha_ultimo_cambio_de_estado;
        $datosCliente->nombreUsuarioCliente= $req->nombreUsuarioCliente;
        $datosCliente->contraseñaCliente= $req->contraseñaCliente;
        $datosCliente->estatusPatron= $req->estatusPatron;
        $datosCliente->save();



        $personaArray = $req->input('persona');

       

        for ($i = 0; $i < count( $personaArray ); $i++) {
            $personaId =  $personaArray [$i];
            $personaRelacionada=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
            ->select('persona.*', 'cliente.*')->where('cliente.fkPersona', '=', $personaId )->first();

            $nuevaRelacionPersona = new clienteClientes();
            $nuevaRelacionPersona ->fkCliente1=  $datosCliente->pkCliente;
            $nuevaRelacionPersona ->fkCliente2=$personaRelacionada->pkCliente;
            $nuevaRelacionPersona ->estatusClienteClientes=1;
            $nuevaRelacionPersona->save();
        }


        $compañiaArray = $req->input('compañia');


        for ($i = 0; $i < count( $compañiaArray ); $i++) {
            $compañiaId =  $compañiaArray [$i];
            $compañiaRelacionada = Compañia::where('pkCompañia', $compañiaId)->first();



            $nuevaCompañia = new ClienteCompañia();
            $nuevaCompañia ->fkCliente=  $datosCliente->pkCliente;
            $nuevaCompañia ->fkCompañia=$compañiaRelacionada->pkCompañia;
            $nuevaCompañia ->estatusCompañiaCliente=1;
            $nuevaCompañia->save();
        }


          
        $domicilioClientes=Domicilio::join('cliente', 'domicilio.fkCliente', '=', 'cliente.pkCliente')
        ->select('domicilio.*')->where('cliente.pkCliente', '=',  $req->input('pkCliente'))->first();

        $domicilioClientes->codigoPostal = $req->codigoPostal ;
        $domicilioClientes->tipoViabilidad = $req->tipoViabilidad;
        $domicilioClientes->nombreViabilidad= $req->nombreViabilidad;
        $domicilioClientes->numeroInterior= $req->numeroInterior;
        $domicilioClientes->colonia=$req->colonia;
        $domicilioClientes->localidad= $req->localidad;
        $domicilioClientes->municipio= $req->municipio;
        $domicilioClientes->entidadFederativa= $req->entidadFederativa;
        $domicilioClientes->entreCalle= $req->entreCalle;
        $domicilioClientes->yCalle= $req->yCalle;
        $domicilioClientes->correoElectronico= $req->correoElectronico;
      
        $domicilioClientes->save();
/*

        // Recibe el archivo de firma electrónica desde la solicitud
        $firmaElectronicaFile = $req->file('firmaElectronica');

        // Crea una nueva instancia de documentosClientes
        $firmaElectronica = new documentosClientes();
        
        // Almacena el nombre original del archivo
        $firmaElectronica->documentoCliente = $firmaElectronicaFile->getClientOriginalName();
        
        // Almacena las fechas de expedición y vencimiento
        $firmaElectronica->fechaExpedicion = $req->fechaExpedicionFirma;
        $firmaElectronica->fechaVencimiento = $req->fechaVencimientoFirma;
        
        // Almacena el archivo en la carpeta 'public' y guarda la ruta
        $ruta = $firmaElectronicaFile->store('public');
        $firmaElectronica->rutaDccumentoCliente = $ruta;
        
        // Asigna las claves foráneas y otros atributos
        $firmaElectronica->fkCliente = $cliente->pkCliente;
        $firmaElectronica->fkTipoDocumento = 1; // Asegúrate de que el tipo de documento sea correcto
        $firmaElectronica->estatusProceso = 1;
        $firmaElectronica->estatusDocumentoCliente = 1;
        
        // Guarda el objeto en la base de datos
        $firmaElectronica->save();

*/
/*
        $factura = new documentosClientes();


        $facturaName=$req->file('factura') ;
         $factura->documentoCliente=   $facturaName->getClientOriginalName();
         $factura->fechaExpedicion= $req->fechaExpedicionFirma;
         $factura->fechaVencimiento= $req->fechaVencimientoFirma;
        $ruta =$facturaName->store('public');
         $factura->rutaDccumentoCliente=$ruta;
         $factura->fkCliente=$cliente->pkCliente;
         $factura->fkTipoDocumento=2;
         $factura->estatusProceso=1;
         $factura->estatusDocumentoCliente=1;
         $factura->save();


        $estadoDeCuenta = new documentosClientes();


        $estadoDeCuentaName=$req->file('estadoCuenta') ;
        $estadoDeCuenta ->documentoCliente=   $estadoDeCuentaName->getClientOriginalName();
        $estadoDeCuenta ->fechaExpedicion= $req->fechaExpedicionFirma;
        $estadoDeCuenta ->fechaVencimiento= $req->fechaVencimientoFirma;
       $ruta =$estadoDeCuentaName->store('public');
        $estadoDeCuenta ->rutaDccumentoCliente=$ruta;
        $estadoDeCuenta ->fkCliente=$cliente->pkCliente;
        $estadoDeCuenta ->fkTipoDocumento=3;
        $estadoDeCuenta ->estatusProceso=1;
        $estadoDeCuenta ->estatusDocumentoCliente=1;
        $estadoDeCuenta ->save();


        $papelesDeTrabajo = new documentosClientes();

        $papelesDeTrabajoName=$req->file('papelesDeTrabajo') ;
         $papelesDeTrabajo ->documentoCliente=    $papelesDeTrabajoName->getClientOriginalName();
         $papelesDeTrabajo ->fechaExpedicion= $req->fechaExpedicionFirma;
         $papelesDeTrabajo ->fechaVencimiento= $req->fechaVencimientoFirma;
        $ruta = $papelesDeTrabajoName->store('public');
         $papelesDeTrabajo ->rutaDccumentoCliente=$ruta;
         $papelesDeTrabajo ->fkCliente=$cliente->pkCliente;
         $papelesDeTrabajo ->fkTipoDocumento=4;
         $papelesDeTrabajo ->estatusProceso=1;
         $papelesDeTrabajo ->estatusDocumentoCliente=1;
         $papelesDeTrabajo ->save();



        if ($req->hasFile('documentos')) {
            foreach ($req->file('documentos') as $documento) {
                $nombreDocumento = $documento->getClientOriginalName();
                $ruta = $documento->store('public');// Crear un nuevo documento asociado al cliente
                $nuevoDocumento = new documentosClientes();
                $nuevoDocumento->documentoCliente = $nombreDocumento;
                $nuevoDocumento->fkTipoDocumento=5; 
                $nuevoDocumento ->estatusProceso=1;
                $nuevoDocumento ->estatusDocumentoCliente=1;// Asegúrate de tener el nombre correcto del campo
                $nuevoDocumento->save();
            }
        }

        */
    }











    function mostrarPersonasFisicasGeneral( ){
        $datosPersonasFisicas=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
                    ->select('persona.*', 'cliente.*')->where('cliente.estatusCliente', '=', '1')->get();

        $datosCompañias=Compañia::select('compañia.*')->where('compañia.estatusCompañia', '=', '1')->get();

        return view("agregarClientePersonaFisica",compact("datosPersonasFisicas","datosCompañias"));
      }


      function listaPersonasMorales( ){
        $datosPersonasFisicas=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
                    ->select('persona.*', 'cliente.*')->where('cliente.estatusCliente', '=', '1')->get();



     
        return view("listaCliente",compact("datosPersonasFisicas"));
      }


      function PersonasFisicaEspecifica( $pkCliente, $vista="detalleCliente"){

        $datoPersonaFisica=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->join('domicilio', 'domicilio.fkCliente', '=', 'cliente.pkCliente')
        ->select('persona.*', 'cliente.*','domicilio.*')->where('cliente.pkCliente', '=', $pkCliente)->first();
     

      
        $datoPersonaRelacionadas = DB::table('clienteclientes')
        ->join('cliente', 'clienteclientes.fkCliente2', '=', 'cliente.pkCliente')
        ->join('persona', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->select(
            'cliente.*',
            'persona.*',
            'clienteclientes.fkCliente2'
        )
        ->where('clienteclientes.fkCliente1', '=', $pkCliente)
        ->get();

        $datosPersonasFisicas = Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->select('persona.*', 'cliente.*')
        ->where('cliente.estatusCliente', '=', '1')
        ->where('cliente.pkCliente', '!=', $pkCliente) 
        ->get();
    



        $datosPendientesCompañia =pendienteCliente::join('empleadorelacioncompañia', 'pendientecliente.fkEmpleadoRelacionCompañia', '=', 'empleadorelacioncompañia.pkEmpleadoRelacionCompañia')
        ->join('compañia', 'compañia.pkCompañia', '=', 'empleadorelacioncompañia.fkCompañia')
        ->join('compañiacliente', 'compañiacliente.fkCompañia', '=', 'compañia.pkCompañia')
        ->join('cliente', 'compañiacliente.fkCliente', '=', 'cliente.pkCliente')
        ->join('tipopendientecliente', 'tipopendientecliente.pkTipoPendienteCliente', '=', 'pendientecliente.fkTipoPendienteCliente')
        ->select( 'pendientecliente.*','compañia.*','tipopendientecliente.*')
        ->where('compañiacliente.fkCliente', '=', $pkCliente) // Asegúrate de que 'fkCliente1' sea el nombre correcto de la columna
        ->get();
    

        $datosPendientes = pendienteCliente::join('empleadorelacioncliente', 'pendientecliente.fkEmpleadoRelacionCliente', '=', 'empleadorelacioncliente.pkEmpleadoRelacionCliente')
        ->join('cliente', 'cliente.pkCliente', '=', 'empleadorelacioncliente.fkCliente')
        ->join('clienteclientes', 'clienteclientes.fkCliente1', '=', 'cliente.pkCliente')
        ->join('compañiacliente', 'compañiacliente.fkCliente', '=', 'cliente.pkCliente')
        ->join('persona', 'persona.pkPersona', '=', 'cliente.fkPersona')
        ->join('tipopendientecliente', 'tipopendientecliente.pkTipoPendienteCliente', '=', 'pendientecliente.fkTipoPendienteCliente')

        ->select('persona.*', 'cliente.*','pendientecliente.*','tipopendientecliente.*')
        ->where('clienteclientes.fkCliente1', '=', $pkCliente) // Asegúrate de que 'fkCliente1' sea el nombre correcto de la columna
        ->get();

    
    $datosCompañias = Compañia::join('compañiacliente', 'compañiacliente.fkCompañia', '=', 'compañia.pkCompañia')
    ->join('cliente', 'cliente.pkCliente', '=', 'compañiacliente.fkCliente')
    ->select(
   
        'compañia.*',
    )
    ->where('compañiacliente.fkCliente', '=', $pkCliente)
    ->where('cliente.pkCliente', '!=', $pkCliente) 
    ->get();


        $datosCompañiasRelacionadas = Compañia::join('compañiacliente', 'compañiacliente.fkCompañia', '=', 'compañia.pkCompañia')
        ->join('cliente', 'cliente.pkCliente', '=', 'compañiacliente.fkCliente')
        ->select(
       
            'compañia.*',
        )
        ->where('compañiacliente.fkCliente', '=', $pkCliente)
        ->get();
     

        return view($vista,compact("datoPersonaFisica","datoPersonaRelacionadas","datosCompañiasRelacionadas","datosPersonasFisicas","datosPendientes","datosPendientesCompañia","datosCompañias"));
      }


      function PersonasFisicaEspecificaFormulario( $pkEmpleado){

  
     
        $datosCompañias = Compañia::join('empleadorelacioncliente', 'empleadorelacioncliente.fkCliente', '=', 'cliente.pkCliente')
        ->select(
       
            'cliente.*',
        )
        ->where('empleadorelacioncliente.fkEmpleado', '=', $pkEmpleado)
        ->get();


   
    

        return view("agregarPendienteACliente",compact("datoPersonaRelacionadas"));
      }

      function CompañiaEspecificaFormulario( $pkEmpleado){


        $datosCompañias = Compañia::join('empleadorelacioncompañia', 'empleadorelacionCompañia.fkCompañia', '=', 'compañia.pkCompañia')
        ->select(
       
            'compañia.*',
        )
        ->where('empleadorelacioncompañia.fkEmpleado', '=', $pkEmpleado)
        ->get();

        


        return view("agregarPendienteAClienteCompañia",compact("datosCompañias"));
      }




      
      function CompañiasyClientesElegir($pkEmpleado ){




        $datosPersonasFisicas=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->select('persona.*', 'cliente.*')->where('cliente.estatusCliente', '=', '1')->get();

        $datosCompañias=Compañia::select('compañia.*')->where('compañia.estatusCompañia', '=', '1')->get();


        $empleado = Empleado::join('persona' , 'empleado.fkPersona', '=', 'persona.pkPersona') ->select('empleado.*', 'persona.*')->where('empleado.pkEmpleado', $pkEmpleado)->first();


    
     

        return view("elegirCompañiaoCliente",compact("datosPersonasFisicas","datosCompañias","pkEmpleado","empleado"));
      }




      public function repartirClienteFisicoMoral(Request $req)
      {  
  
        $pkEmpleado = $req->input('pkEmpleado');
          $personaArray = $req->input('persona');
  
       
  
          for ($i = 0; $i < count( $personaArray ); $i++) {
              $personaId =  $personaArray [$i];
           
  
              $datoPersonaFisica=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
              ->select('persona.*', 'cliente.*')->where('persona.pkPersona', '=',   $personaId )->first();

              $nuevaRelacionPersona = new EmpleadoRelacionCliente();
              $nuevaRelacionPersona ->fkCliente= $datoPersonaFisica->pkCliente;

              $nuevaRelacionPersona ->fkEmpleado=$pkEmpleado;
              $nuevaRelacionPersona ->estatusEmpleadoRelacionCliente=1;
              $nuevaRelacionPersona->save();
          }
  
  
          $compañiaArray = $req->input('compañia');
  
  
          for ($i = 0; $i < count( $compañiaArray ); $i++) {
              $compañiaId =  $compañiaArray [$i];

              $nuevaRelacionPersona = new EmpleadoRelacionCompañia();
              $nuevaRelacionPersona ->fkCompañia= $compañiaId;

              $nuevaRelacionPersona ->fkEmpleado=$pkEmpleado;
              $nuevaRelacionPersona ->estatusEmpleadoRelacionCompañia=1;

              $nuevaRelacionPersona ->save();
          }
  
      
  
  
      }



      function compañiasYpersonasEmpleado( $pkEmpleado,$vista="listaCompañiasClientesEmpleado"){

        


        $datoEmpleado=Persona::join('empleado', 'empleado.fkPersona', '=', 'persona.pkPersona')
        ->select('persona.*', 'empleado.*')->where('empleado.pkEmpleado', '=',   $pkEmpleado )->first();
      
        $datoPersonaRelacionadas = EmpleadoRelacionCliente::join('cliente', 'cliente.pkCliente', '=', 'empleadorelacioncliente.fkCliente')
        ->join('persona', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->join('empleado', 'empleado.pkEmpleado', '=', 'empleadorelacioncliente.fkEmpleado')
        ->select(
            'persona.*',
            'cliente.*',
            'empleado.*',
            'empleadorelacioncliente.*'
        )
        ->where('empleadorelacioncliente.fkEmpleado', '=', $pkEmpleado)
        ->get();


      

        $datosCompañiasRelacionadas = EmpleadoRelacionCompañia::join('compañia', 'empleadorelacioncompañia.fkCompañia', '=', 'compañia.pkCompañia')
        ->select(
            'compañia.*',
            'empleadorelacioncompañia.*',
        )
        ->where('empleadorelacioncompañia.fkEmpleado', '=', $pkEmpleado)
        ->get();
     

        return view($vista,compact("datoPersonaRelacionadas","datosCompañiasRelacionadas","datoEmpleado"));
      }







      
      function compañiasYpersonasEmpleadoFormulario( $pkEmpleado){

        $datoPersonaRelacionadas = EmpleadoRelacionCliente::join('cliente', 'cliente.pkCliente', '=', 'empleadorelacioncliente.fkCliente')
        ->join('persona', 'cliente.fkPersona', '=', 'persona.pkPersona')
        ->join('empleado', 'empleado.pkEmpleado', '=', 'empleadorelacioncliente.fkEmpleado')
        ->select(
            'persona.*',
            'cliente.*',
            'empleado.*',
            'empleadorelacioncliente.*'
        )
        ->where('empleadorelacioncliente.fkEmpleado', '=', $pkEmpleado)
        ->get();


        return view("agregarPendienteACliente",compact("datoPersonaRelacionadas","pkEmpleado"));
      }





    




      
    public function bajarClienteFisico(Request $req, $pkCliente)
    {  
    




      $datosCliente= Cliente::select( 'cliente.*')->where('cliente.pkCliente', '=',  $pkCliente )->first();
 
        $datosCliente->estatusCliente= 0;
        $datosCliente->save();



        

    }
}
