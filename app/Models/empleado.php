<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'pkEmpleado'; 
    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'fkPersona', 'pkPersona');
    }
}
