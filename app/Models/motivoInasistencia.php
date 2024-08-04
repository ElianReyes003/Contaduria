<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivoInasistencia extends Model
{
    use HasFactory;
    protected $table="motivoinasistencia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkMotivoInasistencia';
    public $timestamps=false;
}
