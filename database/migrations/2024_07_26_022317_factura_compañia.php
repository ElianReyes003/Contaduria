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
        Schema::create('facturaCompañia', function (Blueprint $table) {
            $table->id('pkFacturaCompañia')->autoIncrement();
            $table->text('facturaNombreCompañia');
            $table->date('fechaFacturaCompañia');
            $table->unsignedBigInteger('fkCompañiaCliente');
            $table->foreign("fkCompañiaCliente")->references("pkCompañiaCliente")->on("compañiaCliente");
            $table->unsignedBigInteger('fkTipoFactura');
            $table->foreign("fkTipoFactura")->references("pkTipoFactura")->on("tipoFactura");
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
