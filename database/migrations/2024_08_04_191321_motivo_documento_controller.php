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
        Schema::create('motivoDocumento', function (Blueprint $table) {
            $table->id('pkMotivoDocumento')->autoIncrement();
            $table->text('motivoDocumento');
            $table->unsignedBigInteger('fkDocumentoCliente');
            $table->foreign("fkDocumentoCliente")->references("pkDocumentosCliente")->on("documentosCliente");
            $table->smallInteger("estatusMotivoDocumentos");
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
