<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCompañia extends Model
{
    use HasFactory;
    protected $table="compañiacliente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkCompañiaCliente';
    public $timestamps=false;
}
