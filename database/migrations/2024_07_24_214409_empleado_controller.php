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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id('pkEmpleado')->autoIncrement();

            $table->string('nombreEmpleado',90);
            $table->string('nombreUsuario',45);
            $table->string('contraseña',45);
            $table->unsignedBigInteger('fkTipoEmpleado');
            $table->foreign("fkTipoEmpleado")->references("pkTipoEmpleado")->on("tipoEmpleado");
            $table->smallInteger("estatus");
            $table->unsignedBigInteger('fkPersona');
            $table->foreign("fkPersona")->references("pkPersona")->on("persona");
            $table->smallInteger("estatusEmpleado");
            $table->timestamps();
    
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
