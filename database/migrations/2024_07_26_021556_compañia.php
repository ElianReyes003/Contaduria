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
            $table->string('nombreComercial',200);
            $table->string('rfc',30);
            $table->text('denominacion');
            $table->string('regimenCapital',40);
            $table->date('fechaOperaciones');
            $table->date('fechaCambioEstado');
            $table->smallInteger('estatusPatron');
            $table->smallInteger("estatusCompañia");
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
