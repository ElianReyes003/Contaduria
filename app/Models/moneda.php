<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moneda extends Model
{
    use HasFactory;
    protected $table="moneda";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkMoneda';
    public $timestamps=false;
}
