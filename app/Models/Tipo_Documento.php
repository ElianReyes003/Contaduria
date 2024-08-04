<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{
    use HasFactory;
    protected $table="tipodocumento";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkDocumento';
    public $timestamps=false;
}
