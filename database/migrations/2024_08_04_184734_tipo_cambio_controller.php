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
        Schema::create('tipoCambio', function (Blueprint $table) {
            $table->id('pkTipoCambio')->autoIncrement();
            $table->string('nombreTipoCambio',80);
            $table->smallInteger("estatusTipoCambio");
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
