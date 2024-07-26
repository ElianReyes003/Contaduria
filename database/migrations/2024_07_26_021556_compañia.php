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
        Schema::create('compañia', function (Blueprint $table) {
            $table->id('pkCompañia')->autoIncrement();
            $table->string('codigoCompañia',90);
            $table->string('nombreCompañia',90);
            $table->smallInteger("estatus");
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
