<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\solicitudSuper;
use App\Models\Factura;

use App\Models\documentosClientes;

class documento_controller extends Controller
{
    

    public function listaGeneralDocumentos(Request $req){

        $todosDocumentos = documentosClientes::leftJoin('cliente', 'cliente.pkCliente', '=', 'documentoscliente.fkCliente')
    ->leftJoin('compañia', 'compañia.pkCompañia', '=', 'documentoscliente.fkCompañia')
    ->leftJoin('persona', 'persona.pkPersona', '=', 'cliente.fkPersona')
    ->leftJoin('tipodocumento', 'documentoscliente.fkTipoDocumento', '=', 'tipodocumento.pkTipoDocumento')
    ->select(
        'cliente.*', 
        'compañia.*', 
        'documentoscliente.*',
        'tipodocumento.*',
        'persona.*'
    )
    ->get();

    
        return view('historialDocumentos', compact('todosDocumentos'));


    }


    public function formularioAgregarArchivo(Request $req,$pkCliente){



        return view('agregaDocumentosClientes', compact('pkCliente'));
    }


    public function formularioAgregarArchivoCompañia(Request $req,$pkCompañia){



        return view('agregaDocumentosCompañias', compact('pkCompañia'));
    }


    public function agregarDocumentoCliente(Request $req){

        $firmaElectronicaFile = $req->file('documentoSubido');
        $pkCliente = $req->pkCliente;
   
        
        if ($req->fkTipoDocumento == 1) {
            // Crea una nueva instancia de documentosClientes
            $firmaElectronica = new documentosClientes();
            
            // Almacena el nombre original del archivo
            $firmaElectronica->documentoCliente = $firmaElectronicaFile->getClientOriginalName();
            
            // Almacena las fechas de expedición y vencimiento
            $firmaElectronica->fechaExpedicion = $req->fechaExpedicionFirma;
            $firmaElectronica->fechaVencimiento = $req->fechaVencimientoFirma;
            
            // Almacena el archivo en la carpeta 'public' y guarda la ruta
            $ruta = $firmaElectronicaFile->store('public');
            $firmaElectronica->rutaDocumentoCliente = $ruta;
            
            // Asigna las claves foráneas y otros atributos
            $firmaElectronica->fkCliente = $pkCliente;
            $firmaElectronica->fkTipoDocumento = 1;
            $firmaElectronica->estatusProceso = 1;
            $firmaElectronica->estatusDocumentoCliente = 1;
            
            // Guarda el objeto en la base de datos
            $firmaElectronica->save();
        }
        
        if ($req->fkTipoDocumento == 2) {
            $factura = new documentosClientes();
        
            $facturaName = $req->file('documentoSubido');
            $factura->documentoCliente = $facturaName->getClientOriginalName();
            $factura->fechaExpedicion = $req->fechaExpedicion;
            $factura->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $facturaName->store('public');
            $factura->rutaDocumentoCliente = $ruta;
            $factura->fkCliente = $pkCliente;
            $factura->fkTipoDocumento = 2;
            $factura->estatusProceso = 1;
            $factura->estatusDocumentoCliente = 1;
            $factura->save();

            
            $facturaDocumento = new Factura();
        

            $cantidadDigitos = 6; // Cantidad de dígitos que deseas tener en total (incluyendo el pkCompra)
            $codigoFolio = str_pad($factura->pkFactura, $cantidadDigitos, '0', STR_PAD_LEFT);
            $facturaDocumento->serie =$req->serie;
            $facturaDocumento->folio = $codigoFolio ;
            $facturaDocumento->totalFactura = $req->totalFactura;
            $facturaDocumento->fkTipoCambio=$req->fkTipoCambio;
            $facturaDocumento->fkMoneda=$req->fkMoneda;
            $facturaDocumento->fkDocumentoCliente=$factura->pkDocumentosCliente;
            $facturaDocumento->estatusFacturas=1;
        
            $facturaDocumento->save();
        }
        
        if ($req->fkTipoDocumento == 3) {
            $estadoDeCuenta = new documentosClientes();
        
            $estadoDeCuentaName = $req->file('documentoSubido');
            $estadoDeCuenta->documentoCliente = $estadoDeCuentaName->getClientOriginalName();
            $estadoDeCuenta->fechaExpedicion = $req->fechaExpedicion;
            $estadoDeCuenta->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $estadoDeCuentaName->store('public');
            $estadoDeCuenta->rutaDocumentoCliente = $ruta;
            $estadoDeCuenta->fkCliente = $pkCliente;
            $estadoDeCuenta->fkTipoDocumento = 3;
            $estadoDeCuenta->estatusProceso = 1;
            $estadoDeCuenta->estatusDocumentoCliente = 1;
            $estadoDeCuenta->save();
        }
        
        if ($req->fkTipoDocumento == 4) {
            $papelesDeTrabajo = new documentosClientes();
        
            $papelesDeTrabajoName = $req->file('documentoSubido');
            $papelesDeTrabajo->documentoCliente = $papelesDeTrabajoName->getClientOriginalName();
            $papelesDeTrabajo->fechaExpedicion = $req->fechaExpedicion;
            $papelesDeTrabajo->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $papelesDeTrabajoName->store('public');
            $papelesDeTrabajo->rutaDocumentoCliente = $ruta;
            $papelesDeTrabajo->fkCliente = $pkCliente;
            $papelesDeTrabajo->fkTipoDocumento = 4;
            $papelesDeTrabajo->estatusProceso = 1;
            $papelesDeTrabajo->estatusDocumentoCliente = 1;
            $papelesDeTrabajo->save();
        }
        
        if ($req->fkTipoDocumento == 5) {
            if ($req->hasFile('documentos')) {
                foreach ($req->file('documentos') as $documento) {
                    $nombreDocumento = $documento->getClientOriginalName();
                    $ruta = $documento->store('public');
                    
                    $nuevoDocumento = new documentosClientes();
                    $nuevoDocumento->documentoCliente = $nombreDocumento;
                    $nuevoDocumento->fechaExpedicion = now();
                    $nuevoDocumento->fkTipoDocumento = 5;
                    $nuevoDocumento->rutaDocumentoCliente = $ruta;
                    $nuevoDocumento->fkCliente = $pkCliente;
                    $nuevoDocumento->estatusProceso = 1;
                    $nuevoDocumento->estatusDocumentoCliente = 1;
                    $nuevoDocumento->save();
                }
            }
        }
        
    
        return redirect()->route('clienteFisico.detalle', ['pkCliente' => $pkCliente])
        ->with('success', '¡Bienvenido(a), ' . session('nombre') . '!👋');


    }


    
    public function agregarDocumentoCompañia(Request $req){

        $firmaElectronicaFile = $req->file('documentoSubido');
        $pkCompañia = $req->pkCompañia;
   
        
        if ($req->fkTipoDocumento == 1) {
            // Crea una nueva instancia de documentosClientes
            $firmaElectronica = new documentosClientes();
            
            // Almacena el nombre original del archivo
            $firmaElectronica->documentoCliente = $firmaElectronicaFile->getClientOriginalName();
            
            // Almacena las fechas de expedición y vencimiento
            $firmaElectronica->fechaExpedicion = $req->fechaExpedicion;
            $firmaElectronica->fechaVencimiento = $req->fechaVencimiento;
            
            // Almacena el archivo en la carpeta 'public' y guarda la ruta
            $ruta = $firmaElectronicaFile->store('public');
            $firmaElectronica->rutaDocumentoCliente = $ruta;
            
            // Asigna las claves foráneas y otros atributos
            $firmaElectronica->fkCompañia = $pkCompañia;
            $firmaElectronica->fkTipoDocumento = 1;
            $firmaElectronica->estatusProceso = 1;
            $firmaElectronica->estatusDocumentoCliente = 1;
            
            // Guarda el objeto en la base de datos
            $firmaElectronica->save();
        }
        
        if ($req->fkTipoDocumento == 2) {
            $factura = new documentosClientes();
        
            $facturaName = $req->file('documentoSubido');
            $factura->documentoCliente = $facturaName->getClientOriginalName();
            $factura->fechaExpedicion = $req->fechaExpedicion;
            $factura->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $facturaName->store('public');
            $factura->rutaDocumentoCliente = $ruta;
            $factura->fkCompañia = $pkCompañia;
            $factura->fkTipoDocumento = 2;
            $factura->estatusProceso = 1;
            $factura->estatusDocumentoCliente = 1;
            $factura->save();



            $facturaDocumento = new Factura();
        

            $cantidadDigitos = 6; // Cantidad de dígitos que deseas tener en total (incluyendo el pkCompra)
            $codigoFolio = str_pad($factura->pkFactura, $cantidadDigitos, '0', STR_PAD_LEFT);
            $facturaDocumento->serie =$req->serie;
            $facturaDocumento->folio = $codigoFolio ;
            $facturaDocumento->totalFactura = $req->totalFactura;
            $facturaDocumento->fkTipoCambio=$req->fkTipoCambio;
            $facturaDocumento->fkMoneda=$req->fkMoneda;
            $facturaDocumento->fkDocumentoCliente=$factura->pkDocumentosCliente;
            $facturaDocumento->estatusFacturas=1;
        
            $facturaDocumento->save();






        }
        
        if ($req->fkTipoDocumento == 3) {
            $estadoDeCuenta = new documentosClientes();
        
            $estadoDeCuentaName = $req->file('documentoSubido');
            $estadoDeCuenta->documentoCliente = $estadoDeCuentaName->getClientOriginalName();
            $estadoDeCuenta->fechaExpedicion = $req->fechaExpedicion;
            $estadoDeCuenta->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $estadoDeCuentaName->store('public');
            $estadoDeCuenta->rutaDocumentoCliente = $ruta;
            $estadoDeCuenta->fkCompañia = $pkCompañia;
            $estadoDeCuenta->fkTipoDocumento = 3;
            $estadoDeCuenta->estatusProceso = 1;
            $estadoDeCuenta->estatusDocumentoCliente = 1;
            $estadoDeCuenta->save();
        }
        
        if ($req->fkTipoDocumento == 4) {
            $papelesDeTrabajo = new documentosClientes();
        
            $papelesDeTrabajoName = $req->file('documentoSubido');
            $papelesDeTrabajo->documentoCliente = $papelesDeTrabajoName->getClientOriginalName();
            $papelesDeTrabajo->fechaExpedicion = $req->fechaExpedicion;
            $papelesDeTrabajo->fechaVencimiento = $req->fechaVencimiento;
            $ruta = $papelesDeTrabajoName->store('public');
            $papelesDeTrabajo->rutaDocumentoCliente = $ruta;
            $papelesDeTrabajo->fkCompañia = $pkCompañia;
            $papelesDeTrabajo->fkTipoDocumento = 4;
            $papelesDeTrabajo->estatusProceso = 1;
            $papelesDeTrabajo->estatusDocumentoCliente = 1;
            $papelesDeTrabajo->save();
        }
        
        if ($req->fkTipoDocumento == 5) {
            if ($req->hasFile('documentos')) {
                foreach ($req->file('documentos') as $documento) {
                    $nombreDocumento = $documento->getClientOriginalName();
                    $ruta = $documento->store('public');
                    
                    $nuevoDocumento = new documentosClientes();
                    $nuevoDocumento->documentoCliente = $nombreDocumento;
                    $nuevoDocumento->fechaExpedicion = now();
                    $nuevoDocumento->fkTipoDocumento = 5;
                    $nuevoDocumento->rutaDocumentoCliente = $ruta;
                    $nuevoDocumento->fkCompañia = $pkCompañia;
                    $nuevoDocumento->estatusProceso = 1;
                    $nuevoDocumento->estatusDocumentoCliente = 1;
                    $nuevoDocumento->save();
                }
            }
        }
        
    
        return redirect()->route('personaMoral.detalle', ['pkCompañia' => $pkCompañia])
        ->with('success', '¡Bienvenido(a), ' . session('nombre') . '!👋');


    }


}
