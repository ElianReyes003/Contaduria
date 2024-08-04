<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentosClientes extends Model
{
    use HasFactory;
    protected $table="documentoscliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkDocumentosCliente';
    public $timestamps=false;
}
