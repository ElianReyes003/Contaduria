<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPendiente extends Model
{
    use HasFactory;
    protected $table="tipopendiente";
    //si mi id se hubiera llamado diferente
    protected $primaryKey='pkTipoPendiente';
    public $timestamps=false;
}
