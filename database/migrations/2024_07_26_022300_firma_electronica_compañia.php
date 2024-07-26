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
        Schema::create('firmaElectronicaCompañia', function (Blueprint $table) {
            $table->id('pkFirmaElectronicaCompañia')->autoIncrement();
            $table->date('fechaInicioFirmaCompañia');
            $table->date('fechaFinalFirmaCompañia');
            $table->unsignedBigInteger('fkCompañiaCliente');
            $table->foreign("fkCompañiaCliente")->references("pkCompañiaCliente")->on("compañiaCliente");
            $table->unsignedBigInteger('fkTipoFirmaElectronica');
            $table->foreign("fkTipoFirmaElectronica")->references("pkTipoFirmaElectronica")->on("tipoFirmaElectronica");
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
