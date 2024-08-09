<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilioCompañia extends Model
{
    use HasFactory;
    protected $table="domicilioCompañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkDomicilioCompañia';
    public $timestamps=false;
}
