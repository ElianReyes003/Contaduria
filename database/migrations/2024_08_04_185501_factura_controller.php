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
        Schema::create('facturasCliente', function (Blueprint $table) {
            $table->id('pkFacturasCliente')->autoIncrement();
            $table->string('serie',80);
            $table->string('folio',80);
            $table->decimal('totalFactura',10,2);
            $table->unsignedBigInteger('fkTipoCambio');
            $table->foreign("fkTipoCambio")->references("pkTipoCambio")->on("tipoCambio");
            $table->unsignedBigInteger('fkMoneda');
            $table->foreign("fkMoneda")->references("pkMoneda")->on("moneda");
            $table->unsignedBigInteger('fkDocumentoCliente');
            $table->foreign("fkDocumentoCliente")->references("pkDocumentosCliente")->on("documentosCliente");
            $table->smallInteger("estatusFacturas");
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
