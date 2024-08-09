<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Cliente;

use Illuminate\Support\Facades\DB;


class empleadoController extends Controller
{
    public function login(Request $request)
    {
        date_default_timezone_set('America/Mazatlan');

        $nombre = $request->input('nombreUsuario');
        $contraseña = $request->input('contraseña');

        $empleado = $this->buscarEmpleado($nombre, $contraseña);
        $cliente = $this->buscarCliente($nombre, $contraseña);

        if ($empleado) {
            if ($empleado->fkTipoEmpleado == 2) {
                $horaActual = date('H:i');
                $horaInicio = '06:00';
                $horaFin = '22:00';

                if ($horaActual < $horaInicio || $horaActual > $horaFin) {
                    return redirect(url('/'))->with('erroracces', 'No puedes iniciar sesión fuera del horario permitido (06:00AM - 10:00PM)');
                }
            }

            session([
                'id' => $empleado->pkEmpleado,
                'nombre' => $empleado->nombreUsuario,
                'contraseña' => $empleado->contraseña,
                'tipo' => $empleado->fkTipoEmpleado
            ]);

            if ($empleado->fkTipoEmpleado == 2) {
            $this->registrarAsistencia($empleado->pkEmpleado);
            }

            if ($empleado->fkTipoEmpleado == 1) {
                return redirect()->to('/dashboardAdmin')->with('success', '¡Bienvenido, Administrador!👋');
            }
            if ($empleado->fkTipoEmpleado == 2) {
                return redirect()->to('/dashboardEmpleado')->with('success', '¡Bienvenido(a), ' . session('nombre') . '!👋');
            }
        } elseif ($cliente) {
            session([
                'id' => $cliente->pkCliente,
                'nombre' => $cliente->nombreUsuarioCliente,
                'contraseña' => $cliente->contraseñaCliente,
                'tipo' => 3
            ]);
            return redirect()->route('clienteFisico.detalle', ['pkCliente' => session('id')])
            ->with('success', '¡Bienvenido(a), ' . session('nombre') . '!👋');

        } else {
            return redirect(url('/'))->with('credentials', 'Credenciales incorrectas');
        }
    }

    private function registrarAsistencia($empleadoId)
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i');

        $asistencia = DB::table('asistencia')
            ->where('fkEmpleado', $empleadoId)
            ->whereDate('fechaAsistencia', $fechaActual)
            ->first();

            $horaActual = date('H:i');
            $horaLimite = ('08:21');
            
            if (!$asistencia) {
                DB::table('asistencia')->insert([
                    'fechaAsistencia' => $fechaActual,
                    'horaInicio' => $horaActual,
                    'fkEmpleado' => $empleadoId,
                    'estatusAsistencia' => ($horaActual <= $horaLimite) ? 1 : 2,
                ]);
            }
            
    }

    private function buscarEmpleado($nombre, $contraseña)
    {
        $empleado = Empleado::where('nombreUsuario', $nombre)
            ->where('estatus', 1)
            ->first();

        if ($empleado && $contraseña == $empleado->contraseña) {
            return $empleado;
        } else {
            return null;
        }
    }

    private function buscarCliente($nombre, $contraseña)
    {
        $cliente = Cliente::where('nombreUsuarioCliente', $nombre)
            ->where('estatusCliente', 1)
            ->first();

        if ($cliente && $contraseña == $cliente->contraseñaCliente) {
            return $cliente;
        } else {
            return null;
        }
    }

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
        $empleado->fkTipoEmpleado = 2;
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
        $datosEmpleados = Empleado::with('persona')->where('estatus', '1')->where('fkTipoEmpleado', '2')->get();
        return view('listaEmpleado', compact('datosEmpleados'));
    }

    function mostrarEmpleadoPorId($pkEmpleado, $vista = "detalleEmpleado")
    {
        $dato = Empleado::with('persona')->where('pkEmpleado', $pkEmpleado)->first();
        return view($vista, compact("dato"));
    }


    function formularioAgregarPendienteEmployees()
    {
        $datosEmpleados = Empleado::with('persona')->where('estatus', '1')->where('fkTipoEmpleado', '2')->get();
        return view('agregarPendienteAEmpleado', compact("datosEmpleados"));
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
