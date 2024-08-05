<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;                    

class empleadoController extends Controller
{
    public function agregar(Request $req)
    {
        $empleado = new Empleado();
        $empleado->nombreEmpleado = $req->nombre . ' ' . $req->apellidop . ' ' . $req->apellidom;
        $empleado->nombreUsuario = $req->usuario;
        $empleado->contraseña = $req->password; 
        $empleado->fkTipoEmpleado = 1; 
        $empleado->estatus = 1;
        $empleado->save();
        if ($empleado->pkEmpleado) {
            return redirect(url('/RegistrarEmpleado'))->with('success', '¡Empleado Agregado Exitosamente!');
        } else {
            return redirect(url('/RegistrarEmpleado'))->with('error', 'Error en Agregacion De Empleado');
        }
    }
    
    public function mostrarEmpleados(){
        $datosEmpleados = Empleado::where('estatus', '1')->get();
        return view('listaEmpleado', compact('datosEmpleados'));
    }

    function mostrarEmpleadoPorId($pkEmpleado, $vista = "detalleEmpleado"){
        $dato=Empleado::where('empleado.pkEmpleado', '=', $pkEmpleado)->first();
                    return view($vista,compact("dato"));
    }

    public function actualizar(Request $req)
    {
        $empleado= Empleado::find($req->pkEmpleado);
        $empleado->nombreEmpleado = $req->nombre . ' ' . $req->apellidop . ' ' . $req->apellidom;
        $empleado->nombreUsuario = $req->usuario;
        $empleado->contraseña = $req->password; 
        $empleado->save();
        if($empleado){
        return redirect(url('/allEmployees'))->with('success', '¡Actualizacion Empleado Completada!');
        } else {
            return redirect(url('/allEmployees'))->with('error', 'Error en Actualizacion de Empleado');
        }
    }

    public function baja(Request $req)
       {
        $empleado= Empleado::find($req->pkEmpleado);
        $empleado->estatus=0;
        $empleado->save();
        if($empleado){
        return redirect(url('/allEmployees'))->with('success', '¡Baja de Empleado Completada!');
        } else {
            return redirect(url('/allEmployees'))->with('error', 'Error en Baja de Empleado');
          
       }
    }


    
      
}
