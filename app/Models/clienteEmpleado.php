<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienteEmpleado extends Model
{
    use HasFactory;
    protected $table="clienteempleado";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkClienteEmpleado';
    public $timestamps=false;
}
