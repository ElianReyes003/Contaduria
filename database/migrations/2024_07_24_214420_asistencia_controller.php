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
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id('pkAsistencia')->autoIncrement();
            $table->date('fechaAsistencia',90);
            $table->time('horaInicio');
            $table->time('horaFinal')->nullable(); 
            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->smallInteger("estatusAsistencia");
            $table->timestamps();
    
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
