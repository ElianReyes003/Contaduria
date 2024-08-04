<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */  public function up(): void
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->id('pkMoneda')->autoIncrement();
            $table->string('nombreMoneda',80);
            $table->smallInteger("estatusMoneda");
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
