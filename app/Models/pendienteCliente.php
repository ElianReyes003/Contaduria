<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendienteCliente extends Model
{
    use HasFactory;
    protected $table="pendientecliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkPendienteCliente';
    public $timestamps=false;
}
