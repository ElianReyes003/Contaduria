<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class firmaElectronica extends Model
{
    use HasFactory;
    protected $table="firmaelectronica";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkFirmaElectronica';
    public $timestamps=false;
}
