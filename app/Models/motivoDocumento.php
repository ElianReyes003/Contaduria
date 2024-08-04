<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivoDocumento extends Model
{
    use HasFactory;
    protected $table="motivodocumento";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkMotivoDocumento';
    public $timestamps=false;
}
