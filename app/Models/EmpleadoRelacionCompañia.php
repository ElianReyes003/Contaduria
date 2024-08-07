<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoRelacionCompañia extends Model
{
    use HasFactory;
    protected $table="empleadorelacioncompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkEmpleadoRelacionCliente';
    public $timestamps=false;
}
