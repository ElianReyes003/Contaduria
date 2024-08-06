<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Compañia;

use App\Models\domicilioCompañia;

class persona_moral_controller extends Controller
{




    public function agregarClienteMoral(Request $req)
    {  

        $ultimaCompania = Compañia::orderBy('pkCompañia', 'desc')->first();
        $pkUltimaCompania = $ultimaCompania ? $ultimaCompania->pkCompañia : 0;


        $compañia = new Compañia();

        $cantidadDigitos = 6; // Cantidad de dígitos que deseas tener en total (incluyendo el pkCompra)
        $codigocompañia= str_pad($pkUltimaCompania+1, $cantidadDigitos, '0', STR_PAD_LEFT);
        $compañia->codigocompañia = $codigocompañia;
        $compañia->nombreComercial = $req->nombreComercial;
        $compañia->rfc = $req->rfc;
        $compañia->denominacion= $req->denominacion;
        $compañia->regimenCapital= $req->regimenCapital;
        $compañia->fechaOperaciones= $req->fechaOperaciones;
        $compañia->fechaCambioEstado= $req->fechaCambioEstado;
        $compañia->estatusPatron= $req->estatusPatron;
        $compañia->estatuscompañia= 1;
        $compañia->save();

        $domicilio = new domicilioCompañia();
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
        $domicilio->fkCompañia= $compañia->pkCompañia;
        $domicilio->estatusDomicilioCompañia= 1;
        $domicilio->save();

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


public function actualizarClienteMoral(Request $req)
{  


    $compañiaEspecifica = Compañia::select('compañia.*')
    ->where('pkCompañia', '=', $req->pkCompañia)
    ->first();

    $compañiaEspecifica->nombreComercial = $req->nombreComercial;
    $compañiaEspecifica->rfc = $req->rfc;
    $compañiaEspecifica->denominacion= $req->denominacion;
    $compañiaEspecifica->regimenCapital= $req->regimenCapital;
    $compañiaEspecifica->fechaOperaciones= $req->fechaOperaciones;
    $compañiaEspecifica->fechaCambioEstado= $req->fechaCambioEstado;
    $compañiaEspecifica->estatusPatron= $req->estatusPatron;
    $compañiaEspecifica->save();



    
    $domicilioEspecifico = domicilioCompañia::select('domiciliocompañia.*')
    ->where('fkCompañia', '=', $req->pkCompañia)
    ->first();

    $domicilioEspecifico ->codigoPostal = $req->codigoPostal;
    $domicilioEspecifico ->tipoViabilidad = $req->tipoViabilidad;
    $domicilioEspecifico ->nombreViabilidad= $req->nombreViabilidad;
    $domicilioEspecifico ->numeroInterior= $req->numeroInterior;
    $domicilioEspecifico ->colonia=$req->colonia;
    $domicilioEspecifico ->localidad= $req->localidad;
    $domicilioEspecifico ->municipio= $req->municipio;
    $domicilioEspecifico ->entidadFederativa= $req->entidadFederativa;
    $domicilioEspecifico ->entreCalle= $req->entreCalle;
    $domicilioEspecifico ->yCalle= $req->yCalle;
    $domicilioEspecifico ->correoElectronico= $req->correoElectronico;
    $domicilioEspecifico->save();
}





public function bajaClienteMoral(Request $req,$pkCompañia)
{  


    $compañiaEspecifica = Compañia::select('compañia.*')
    ->where('pkCompañia', '=', $pkCompañia)
    ->first();

 
    $compañiaEspecifica->estatusCompañia= 0;
    $compañiaEspecifica->save();



    
 
}









function listaGenerarlPersonasMorales( ){
    
    $datosCompañias = Compañia::select('compañia.*')
    ->where('estatusCompañia', '=', '1')
    ->get();


 
    return view("listaCompañia",compact("datosCompañias"));
  }


  
  function PersonasMoralEspecifica( $pkCompañia ,$vista="detalleCompañia"){

    $datoPersonaMoral=Compañia::join('domiciliocompañia', 'domiciliocompañia.fkCompañia', '=', 'compañia.pkCompañia')
    ->select('compañia.*', 'domiciliocompañia.*')->where('compañia.pkCompañia', '=', $pkCompañia)->first();
    

    return view($vista,compact("datoPersonaMoral"));

  }



}