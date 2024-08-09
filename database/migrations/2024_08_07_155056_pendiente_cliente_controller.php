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
            $table->unsignedBigInteger('fkEmpleadoRelacionCompañia');
            $table->foreign("fkEmpleadoRelacionCompañia")->references("pkEmpleadoRelacionCompañia")->on("empleadorelacioncompañia")->nullable();
            $table->unsignedBigInteger('fkEmpleadoRelacionCliente');
            $table->foreign("fkEmpleadoRelacionCliente")->references("pkEmpleadoRelacionCliente")->on("empleadorelacioncliente")->nullable();
            $table->unsignedBigInteger('fkTipoPendienteCliente');
            $table->foreign("fkTipoPendienteCliente")->references("pkTipoPendienteCliente")->on("tipoPendienteCliente");
            $table->smallInteger("estatusPendienteCliente");
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
