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
        Schema::create('superficieocular', function (Blueprint $table) {
            $table->unsignedInteger("idFicha");
            $table->increments('id');

            $table->string("estadocornea_od")->nullable();
            $table->string("peliculalagrimal_od")->nullable();
            $table->string("tincion_od")->nullable();

            $table->string("estadocornea_oi")->nullable();
            $table->string("peliculalagrimal_oi")->nullable();
            $table->string("tincion_oi")->nullable();

            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
                    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superficieocular');
    }
};
