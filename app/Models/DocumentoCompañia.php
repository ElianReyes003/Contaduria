<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoCompañia extends Model
{
    use HasFactory;
    protected $table="documentocompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkDocumentoCompañia';
    public $timestamps=false;
}
