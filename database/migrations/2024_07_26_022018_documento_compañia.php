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
        Schema::create('documentoCompañia', function (Blueprint $table) {
            $table->id('pkDocumentoCompañia')->autoIncrement();
            $table->text('documentoNombreCompañia');
            $table->date('fechaDocumentoCompañia');
            $table->unsignedBigInteger('fkCompañiaCliente');
            $table->foreign("fkCompañiaCliente")->references("pkCompañiaCliente")->on("compañiaCliente");
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
