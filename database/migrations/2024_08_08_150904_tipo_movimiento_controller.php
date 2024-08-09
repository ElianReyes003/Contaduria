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
        Schema::create('tipoMovimiento', function (Blueprint $table) {
            $table->id('pkTipoMovimiento')->autoIncrement();
            $table->string('nombreTipoMovimiento',80);
            $table->smallInteger("estatusTipoMovimiento");
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
