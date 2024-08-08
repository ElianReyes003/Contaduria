<?php

namespace App\Http\Controllers;

use App\Models\clienteClientes;
use Illuminate\Http\Request;

use App\Models\EmpleadoRelacionCliente;
use App\Models\EmpleadoRelacionCompañia;

use App\Models\pendienteEmpleado;
use App\Models\pendienteCliente;
use App\Models\Compañia;
use App\Models\Empleado;
use App\Models\Persona;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class pendiente_controller extends Controller
{
    public function agregarPendiente(Request $req)
    {
            date_default_timezone_set('America/Mazatlan');
        $pendiente = new pendienteEmpleado();
        $pendiente->tareaEmpleado = $req->tareaEmpleado;
        $pendiente->fechaPendienteEmpleado = now();

        $personaArray = $req->input('persona');

        $pendiente->fkEmpleado =$personaArray [0];
        $pendiente->fkTipoPendiente =$req->fkTipoPendiente;
        $pendiente->estatusPendienteEmpleado =1;


        $pendiente->save();

       
    }


    public function agregarPendienteCliente(Request $req)
    
    {

        date_default_timezone_set('America/Mazatlan');
        
        $personaArray = $req->input('persona');

        for ($i = 0; $i < count( $personaArray ); $i++) {
            $personaId =  $personaArray [$i];
            $personaRelacionada=Persona::join('cliente', 'cliente.fkPersona', '=', 'persona.pkPersona')
            ->select('persona.*', 'cliente.*')->where('cliente.fkPersona', '=', $personaId )->first();

            
        
            $personaRelacionada = EmpleadoRelacionCliente::join('cliente', 'empleadorelacioncliente.fkCliente', '=', 'cliente.pkCliente')
            ->select(
           
            
                'empleadorelacioncliente.*'
            )
            ->where('empleadorelacioncliente.fkCliente', '=', $personaRelacionada->pkCliente)
            ->first();

           

        
            $pendiente= new pendienteCliente();
            $pendiente->tareaCliente = $req->tareaEmpleado;
            $pendiente->fechaPendienteCliente = now();
    
            $pendiente->fkEmpleadoRelacionCliente =  $personaRelacionada->pkEmpleadoRelacionCliente;
            $pendiente->fkTipoPendienteCliente =$req->fkTipoPendiente;
            $pendiente->estatusPendienteCliente =1;

            $pendiente->save();
        }

       
    }



    public function agregarPendienteCompañia(Request $req)
    
    {

        date_default_timezone_set('America/Mazatlan');


        $compañiaArray = $req->input('compañia');



        for ($i = 0; $i < count( $compañiaArray ); $i++) {
            $compañiaId =  $compañiaArray [$i];
            $compañiaRelacionada = Compañia::where('pkCompañia', $compañiaId)->first();
            $personaRelacionada = EmpleadoRelacionCompañia::join('compañia', 'empleadorelacioncompañia.fkCompañia', '=', 'compañia.pkCompañia')
            ->select(
           
            
                'empleadorelacioncompañia.*'
            )
            ->where('empleadorelacioncompañia.fkCompañia', '=', $compañiaRelacionada->pkCompañia)
            ->first();

           

        
            $pendiente= new pendienteCliente();
            $pendiente->tareaCliente = $req->tareaEmpleado;
            $pendiente->fechaPendienteCliente = now();
    
            $pendiente->fkEmpleadoRelacionCompañia =  $personaRelacionada->pkEmpleadoRelacionCompañia;
            $pendiente->fkTipoPendienteCliente =$req->fkTipoPendiente;
            $pendiente->estatusPendienteCliente =1;

            $pendiente->save();
        }

       
    }






    public function listaPendientesEmpleadosPersonales(Request $req, $pkEmpleado)
    {


        $datoEmpleado = Empleado::join('persona', 'persona.pkPersona', '=', 'empleado.fkPersona')->where('empleado.pkEmpleado', $pkEmpleado)->first();

        $todosPendientes=pendienteEmpleado::join('empleado', 'pendienteempleado.fkEmpleado', '=', 'empleado.pkEmpleado')
        ->join('tipoPendiente', 'tipoPendiente.pkTipoPendiente', '=', 'pendienteempleado.fkTipoPendiente')
        ->select('pendienteempleado.*','tipoPendiente.*')->where('empleado.pkEmpleado', '=', $pkEmpleado )->get();

        return view('listaPendientesEmpleadoPersonal', compact('todosPendientes','datoEmpleado'));

       
    }


    public function listaPendientesEmpleadosGeneral(Request $req)
    {

        $todosPendientes=pendienteEmpleado::join('empleado', 'pendienteempleado.fkEmpleado', '=', 'empleado.pkEmpleado')
        ->join('persona', 'persona.pkPersona', '=', 'empleado.fkPersona')
        ->join('tipoPendiente', 'tipoPendiente.pkTipoPendiente', '=', 'pendienteempleado.fkTipoPendiente')
        ->select('pendienteempleado.*','tipoPendiente.*','persona.*','empleado.*')->get();

        return view('listaPendientesEmpleadoGeneral', compact('todosPendientes'));

       
    }



}
