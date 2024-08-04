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
        Schema::create('documentosCliente', function (Blueprint $table) {
            $table->id('pkDocumentosCliente')->autoIncrement();
            $table->date('fechaExpedicion');
            $table->date('fechaVencimiento');
            $table->text('documentoCliente');
            $table->unsignedBigInteger('fkCompañiaCliente');
            $table->foreign("fkCompañiaCliente")->references("pkCompañiaCliente")->on("compañiaCliente");
            $table->unsignedBigInteger('fkTipoDocumento');
            $table->foreign("fkTipoDocumento")->references("pkTipoDocumento")->on("tipoDocumento");
            $table->smallInteger("estatusProceso");
            $table->smallInteger("estatusDocumentoCliente");
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
