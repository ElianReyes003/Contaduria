<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendienteEmpleado extends Model
{
    use HasFactory;
    protected $table="pendienteempleado";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkPendienteEmpleado';
    public $timestamps=false;
}
