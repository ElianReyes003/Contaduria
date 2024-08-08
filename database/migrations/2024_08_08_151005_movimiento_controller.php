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
        Schema::create('movimiento', function (Blueprint $table) {
            
            $table->id('pkMovimiento')->autoIncrement();
            $table->unsignedBigInteger('fkCliente');
            $table->foreign("fkCliente")->references("pkCliente")->on("cliente");
            $table->unsignedBigInteger('fkEmpleado');
            $table->foreign("fkEmpleado")->references("pkEmpleado")->on("empleado");
            $table->unsignedBigInteger('fkTipoMovimiento');
            $table->foreign("fkTipoMovimiento")->references("pkTipoMovimiento")->on("tipomovimiento");
            $table->date('fechaMovimiento');
            $table->smallInteger("estatusMovimiento");
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
