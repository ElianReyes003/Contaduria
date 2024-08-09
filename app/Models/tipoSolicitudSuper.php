<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoSolicitudSuper extends Model
{
    use HasFactory;
    protected $table="tiposolicitudsuper";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoSolicitudSuper';
    public $timestamps=false;
}
