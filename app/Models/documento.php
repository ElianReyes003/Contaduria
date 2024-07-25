<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;
    protected $table="documento";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkDocumento';
    public $timestamps=false;
}
