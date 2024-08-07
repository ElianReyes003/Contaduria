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
        

        Schema::create('empleadoRelacionCompañia', function (Blueprint $table) {
            $table->id('pkEmpleadoRelacionCompañia')->autoIncrement();
            $table->unsignedBigInteger('fkCompañia');
            $table->foreign("fkCompañia")->references("pkCompañia")->on("compañia");

            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->smallInteger("estatusEmpleadoRelacionCompañia");
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
