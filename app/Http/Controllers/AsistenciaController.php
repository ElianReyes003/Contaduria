<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    public function mostrarAsistencia()
    {
        $asistencias = DB::table('asistencia')
        ->join('empleado', 'asistencia.fkEmpleado', '=', 'empleado.pkEmpleado')
        ->join('persona', 'empleado.fkPersona', '=', 'persona.pkPersona')
        ->select('persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno', 'asistencia.horaInicio','asistencia.horaFinal', 'asistencia.estatusAsistencia')
        ->get();

    return view('paginaInicio', ['asistencias' => $asistencias]);
    }
    
}


