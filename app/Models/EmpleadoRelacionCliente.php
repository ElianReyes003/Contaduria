<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoRelacionCliente extends Model
{
    use HasFactory;
    protected $table="empleadorelacioncliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkEmpleadoRelacionCompañia';
    public $timestamps=false;
}
