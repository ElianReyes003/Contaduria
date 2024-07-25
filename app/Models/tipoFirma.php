<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoFirma extends Model
{
    use HasFactory;
    protected $table="tipofirma";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoFirma';
    public $timestamps=false;
}
