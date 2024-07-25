<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoCliente extends Model
{
    use HasFactory;
    protected $table="tipocliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoCliente';
    public $timestamps=false;
}
