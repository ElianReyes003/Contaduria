<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmaElectronicaCompañia extends Model
{
    use HasFactory;
    protected $table="firmaelectronicacompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkFirmaElectronicaCompañia';
    public $timestamps=false;
}
