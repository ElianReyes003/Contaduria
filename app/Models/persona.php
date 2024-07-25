<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    use HasFactory;
    protected $table="persona";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkPersona';
    public $timestamps=false;
}
