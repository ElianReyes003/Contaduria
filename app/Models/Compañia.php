<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compañia extends Model
{
    use HasFactory;
    protected $table="compañia";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkCompañia';
    public $timestamps=false;
}
