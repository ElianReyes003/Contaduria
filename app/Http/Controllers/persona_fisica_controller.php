<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Domicilio;

class persona_fisica_controller extends Controller
{
    public function agregarClienteFisico(Request $req)
    {  

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



    }
}
