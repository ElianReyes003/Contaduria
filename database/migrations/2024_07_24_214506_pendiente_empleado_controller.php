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
        Schema::create('pendienteEmpleado', function (Blueprint $table) {
            $table->id('pkPendienteEmpleado')->autoIncrement();
            $table->text('tareaEmpleado');
            $table->date('fechaPendienteEmpleado');
            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->unsignedBigInteger('fkTipoPendiente');
            $table->foreign("fkTipoPendiente")->references("pkTipoPendiente")->on("tipoPendiente");
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
