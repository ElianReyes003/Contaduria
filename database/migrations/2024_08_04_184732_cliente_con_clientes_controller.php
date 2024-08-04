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
        Schema::create('clienteClientes', function (Blueprint $table) {
            $table->id('pkClienteClientes')->autoIncrement();
           
            $table->unsignedBigInteger('fkCliente1');
            $table->foreign("fkCliente1")->references("pkCliente")->on("cliente");
            $table->unsignedBigInteger('fkCliente2');
            $table->foreign("fkCliente2")->references("pkCliente")->on("cliente");
            $table->smallInteger("estatusClienteClientes");
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
