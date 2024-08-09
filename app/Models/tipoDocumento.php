<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoDocumento extends Model
{
    use HasFactory;
    protected $table="tipodocumento";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoDocumento';
    public $timestamps=false;
}
