<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoCambio extends Model
{

    use HasFactory;
    protected $table="tipoCambio";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoCambio';
    public $timestamps=false;
    use HasFactory;
}
