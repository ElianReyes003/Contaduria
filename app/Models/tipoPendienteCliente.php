<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPendienteCliente extends Model
{
    use HasFactory;
    protected $table="tipopendientecliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoPendienteCliente';
    public $timestamps=false;
}
