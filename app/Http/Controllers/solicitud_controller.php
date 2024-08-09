<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\solicitudSuper;


use App\Models\EmpleadoRelacionCliente;

use App\Models\EmpleadoRelacionCompañia;

class solicitud_controller extends Controller
{
    public function crearSolicitud(Request $req)
    {  


        date_default_timezone_set('America/Mazatlan');


      $pkEmpleado = $req->input('pkEmpleado');
        $personaArray = $req->input('persona');

     

        for ($i = 0; $i < count( $personaArray ); $i++) {
            $personaId =  $personaArray [$i];
         

            $datoPersonaFisica=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
            ->select('persona.*', 'cliente.*')->where('persona.pkPersona', '=',   $personaId )->first();

            $solicitudSuper=new solicitudSuper();
            $solicitudSuper->tituloSolicitud=$req->tituloSolicitud;
            $solicitudSuper->fkTipoSolicitudSuper=$req->fkTipoSolicitudSuper;
            $solicitudSuper->fechaSolicitudSuper=now();
            $solicitudSuper ->fkCliente= $datoPersonaFisica->pkCliente;

            $solicitudSuper ->fkEmpleado=$pkEmpleado;
            $solicitudSuper ->estatusSolicitudSuper=1;
            $solicitudSuper->save();
        }


        $compañiaArray = $req->input('compañia');


        for ($i = 0; $i < count( $compañiaArray ); $i++) {
            $compañiaId =  $compañiaArray [$i];


            $solicitudSuper=new solicitudSuper();
            $solicitudSuper->tituloSolicitud=$req->tituloSolicitud;
            $solicitudSuper->fkTipoSolicitudSuper=$req->fkTipoSolicitudSuper;
            $solicitudSuper->fechaSolicitudSuper=now();
            $solicitudSuper ->fkCompañia= $compañiaId ;

            $solicitudSuper ->fkEmpleado=$pkEmpleado;
            $solicitudSuper ->estatusSolicitudSuper=1;
            $solicitudSuper->save();
        }

    


    }


    public function listaGeneralPeticiones(Request $req){

        $todosPendientes = solicitudSuper::leftJoin('empleado', 'solicitudsuper.fkEmpleado', '=', 'empleado.pkEmpleado')
        ->leftJoin('cliente', 'cliente.pkCliente', '=', 'solicitudsuper.fkCliente')
        ->leftJoin('compañia', 'compañia.pkCompañia', '=', 'solicitudsuper.fkCompañia')
        ->leftJoin('persona as persona_cliente', 'persona_cliente.pkPersona', '=', 'cliente.fkPersona')
        ->leftJoin('persona as persona_empleado', 'persona_empleado.pkPersona', '=', 'empleado.fkPersona')
        ->leftJoin('tiposolicitudsuper', 'solicitudsuper.fkTipoSolicitudSuper', '=', 'tiposolicitudsuper.pkTipoSolicitudSuper')
        ->select(
            'cliente.*', 
            'persona_cliente.nombre as nombre_cliente', 
            'persona_cliente.apellidoPaterno as apellidoPaterno_cliente', 
            'persona_cliente.apellidoMaterno as apellidoMaterno_cliente', 
            'compañia.*', 
            'empleado.*', 
            'persona_empleado.nombre as nombre_empleado', 
            'persona_empleado.apellidoPaterno as apellidoPaterno_empleado', 
            'persona_empleado.apellidoMaterno as apellidoMaterno_empleado', 
            'solicitudSuper.*',
            'tiposolicitudsuper.*'
        )
        ->get();

    

        return view('historialSolicitudesSuper', compact('todosPendientes'));


    }

}
