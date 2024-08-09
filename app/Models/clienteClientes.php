<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clienteClientes extends Model
{
    
    
    use HasFactory;
    protected $table="clienteClientes";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkClienteClientes';
    public $timestamps=false;
}
