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
        Schema::create('solicitudSuper', function (Blueprint $table) {
            $table->id('pkSolicitudSuper')->autoIncrement();
            $table->date('fechaSolicitudSuper');
            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->unsignedBigInteger('fkTipoSolicitudSuper');
            $table->foreign("fkTipoSolicitudSuper")->references("pkTipoSolicitudSuper")->on("tipoSolicitudSuper");
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
