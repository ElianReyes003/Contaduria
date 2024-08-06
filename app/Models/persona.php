<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona'; 
    protected $primaryKey = 'pkPersona';
    public $timestamps = false;

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellidoPaterno . ' ' . $this->apellidoMaterno;
    }

    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
    ];
}
