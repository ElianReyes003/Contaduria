<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudSuper extends Model
{
    use HasFactory;
    protected $table="solicitudsuper";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkSolicitudSuper';
    public $timestamps=false;
}
