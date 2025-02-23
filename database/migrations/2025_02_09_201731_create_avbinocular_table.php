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
        Schema::create('avbinocular', function (Blueprint $table) {
            $table->unsignedInteger('idFicha');
            $table->increments('id');
            $table->string('esfera_od')->nullable();
            $table->string('ejecilindro_od')->nullable();
            $table->string('correccion_od')->nullable();
            $table->string('esfera_oi')->nullable();
            $table->string('ejecilindro_oi')->nullable();
            $table->string('correccion_oi')->nullable();
            $table->string('agudezavisual_binoc')->nullable();
            
            //$table->primary('idFicha');
            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avbinocular');
    }
};
