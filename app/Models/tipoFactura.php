<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoFactura extends Model
{
    use HasFactory;
    protected $table="tipofactura";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoFactura';
    public $timestamps=false;
}
