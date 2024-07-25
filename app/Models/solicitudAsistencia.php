<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudAsistencia extends Model
{
    use HasFactory;
    protected $table="solicitudasistencia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkSolicitudAsistencia';
    public $timestamps=false;
}
