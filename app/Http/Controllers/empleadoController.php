<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Persona;

class empleadoController extends Controller
{
    public function agregar(Request $req)
    {
        $persona = new Persona();
        $persona->nombre = $req->nombre;
        $persona->apellidoPaterno = $req->apellidop;
        $persona->apellidoMaterno = $req->apellidom;
        $persona->save();

        $empleado = new Empleado();
        $empleado->nombreUsuario = $req->usuario;
        $empleado->contraseña = $req->password;
        $empleado->fkTipoEmpleado = 1;
        $empleado->fkPersona = $persona->pkPersona; 
        $empleado->estatus = 1;
        $empleado->save();
        if ($empleado->pkEmpleado) {
            return redirect(url('/RegistrarEmpleado'))->with('success', '¡Empleado Agregado Exitosamente!');
        } else {
            return redirect(url('/RegistrarEmpleado'))->with('error', 'Error en Agregacion De Empleado');
        }
    }

    public function mostrarEmpleados()
    {
        $datosEmpleados = Empleado::with('persona')->where('estatus', '1')->get();
        return view('listaEmpleado', compact('datosEmpleados'));
    }

    function mostrarEmpleadoPorId($pkEmpleado, $vista = "detalleEmpleado")
    {
        $dato = Empleado::with('persona')->where('pkEmpleado', $pkEmpleado)->first();
        return view($vista, compact("dato"));
    }

    public function actualizar(Request $req)
    {
        $empleado = Empleado::with('persona')->find($req->pkEmpleado);
        $empleado->persona->update([
            'nombre' => $req->nombre,
            'apellidoPaterno' => $req->apellidop,
            'apellidoMaterno' => $req->apellidom,
        ]);
        $empleado->nombreUsuario = $req->usuario;
        $empleado->contraseña = $req->password;

        $empleado->save();
        if ($empleado) {
            return redirect(url('/allEmployees'))->with('success', '¡Actualizacion Empleado Completada!');
        } else {
            return redirect(url('/allEmployees'))->with('error', 'Error en Actualizacion de Empleado');
        }
    }

    public function baja(Request $req)
    {
        $empleado = Empleado::find($req->pkEmpleado);
        $empleado->estatus = 0;
        $empleado->save();
        if ($empleado) {
            return redirect(url('/allEmployees'))->with('success', '¡Baja de Empleado Completada!');
        } else {
            return redirect(url('/allEmployees'))->with('error', 'Error en Baja de Empleado');
        }
    }
}
