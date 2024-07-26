<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCompañia extends Model
{
    use HasFactory;
    protected $table="clientecompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkCLienteCompañia';
    public $timestamps=false;
}
