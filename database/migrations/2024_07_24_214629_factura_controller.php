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
        Schema::create('factura', function (Blueprint $table) {
            $table->id('pkFactura')->autoIncrement();
            $table->text('facturaNombre');
            $table->date('fechaFactura');
            $table->unsignedBigInteger('fkCliente');
            $table->foreign("fkCliente")->references("pkCliente")->on("cliente");
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
