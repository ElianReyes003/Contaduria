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
        Schema::create('pendienteCliente', function (Blueprint $table) {
            $table->id('pkPendienteCliente')->autoIncrement();
            $table->text('tareaÇliente');
            $table->date('fechaPendienteCliente');
            $table->unsignedBigInteger('fkClienteEmpleado');
            $table->foreign("fkClienteEmpleado")->references("pkClienteEmpleado")->on("clienteEmpleado");
            $table->unsignedBigInteger('fkTipoPendienteCliente');
            $table->foreign("fkTipoPendienteCliente")->references("pkTipoPendienteCliente")->on("tipoPendienteCliente");
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
