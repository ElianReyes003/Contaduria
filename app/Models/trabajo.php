<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajo extends Model
{
    use HasFactory;
    protected $table="trabajo";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTrabajo';
    public $timestamps=false;
}
