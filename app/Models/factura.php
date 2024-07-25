<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table="factura";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkFactura';
    public $timestamps=false;
}
