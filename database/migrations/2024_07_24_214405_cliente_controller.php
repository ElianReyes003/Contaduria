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
        Schema::create('cliente', function (Blueprint $table) {
        $table->id('pkCliente')->autoIncrement();
        $table->string('codigoCliente',90);
        $table->string('nombreCliente',90);
        $table->string('nombreUsuarioCliente',45);
        $table->string('contraseñaCliente',45);
        $table->unsignedBigInteger('fkTipoCliente');
        $table->foreign("fkTipoCliente")->references("pkTipoCliente")->on("tipoCliente");
        $table->smallInteger("estatus");
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
