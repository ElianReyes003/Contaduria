<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table="facturascliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkFacturasCliente';
    public $timestamps=false;
}
