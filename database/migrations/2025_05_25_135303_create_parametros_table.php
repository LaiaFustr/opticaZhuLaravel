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
        Schema::create('parametros', function (Blueprint $table) {
            $table->unsignedInteger('idFicha')->nullable();
            $table->increments("id");
            $table->string('curvabase_od')->nullable();
            $table->string("diametro_od")->nullable();
            $table->string("potencia_od")->nullable();
            $table->string("eje_od")->nullable();

            $table->string("curvabase_oi")->nullable();
            $table->string("diametro_oi")->nullable();
            $table->string("potencia_oi")->nullable();
            $table->string("eje_oi")->nullable();

            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('set null')->onUpdate('restrict');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
