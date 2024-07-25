<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trabajo', function (Blueprint $table) {
            $table->id('pkTrabajo')->autoIncrement();
            $table->unsignedBigInteger('fkClienteEmpleado');  
            $table->text('trabajoDetalle');
            $table->date('fechaTrabajo');
            $table->foreign("fkClienteEmpleado")->references("pkClienteEmpleado")->on("clienteEmpleado");
            $table->smallInteger("estatus");
            $table->timestamps();
    
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
