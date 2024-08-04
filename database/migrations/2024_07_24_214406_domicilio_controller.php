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
        Schema::create('domicilio', function (Blueprint $table) {
        $table->id('pkDomicilio')->autoIncrement();
        $table->string('codigoPostal',50);
        $table->string('tipoViabilidad',80);
        $table->string('nombreViabilidad',100);
        $table->string('numeroInterior',100);
        $table->text('colonia');
        $table->text('localidad');
        $table->text('municipio');
        $table->string('entidadFederativa',100);
        $table->text('entreCalle');
        $table->text('yCalle');
        $table->text('correoElectronico');
        $table->unsignedBigInteger('fkTipoCliente');
        $table->foreign("fkTipoCliente")->references("pkTipoCliente")->on("tipoCliente");
        $table->smallInteger("estatusDomicilio");
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilio');
    }
};
