<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaCompañia extends Model
{
    use HasFactory;
    protected $table="facturacompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkFacturaCompañia';
    public $timestamps=false;
}
