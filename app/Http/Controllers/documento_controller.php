<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\solicitudSuper;

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

}
