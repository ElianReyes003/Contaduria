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
            $table->text('tituloSolicitud');
            $table->date('fechaSolicitudSuper');
            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->unsignedBigInteger('fkCliente');
            $table->foreign("fkCliente")->references("pkCliente")->on("cliente");
            $table->unsignedBigInteger('fkCompañia');
            $table->foreign("fkCompañia")->references("pkCompañia")->on("compañia");
            $table->unsignedBigInteger('fkTipoSolicitudSuper');
            $table->foreign("fkTipoSolicitudSuper")->references("pkTipoSolicitudSuper")->on("tipoSolicitudSuper");
            $table->smallInteger("estatusSolicitudSuper");
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
