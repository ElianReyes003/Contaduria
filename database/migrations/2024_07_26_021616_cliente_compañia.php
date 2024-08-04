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
        Schema::create('compañiaCliente', function (Blueprint $table) {
            $table->id('pkCompañiaCliente')->autoIncrement();
            $table->unsignedBigInteger('fkCompañia');
            $table->foreign("fkCompañia")->references("pkCompañia")->on("compañia");
            $table->unsignedBigInteger('fkCliente');
            $table->foreign("fkCliente")->references("pkCliente")->on("cliente");
            $table->smallInteger("estatusCompañiaCliente");
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
