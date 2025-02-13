<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//estereopsis vision tridimensional
return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('estereopsis', function (Blueprint $table) {
            $table->unsignedInteger('idFicha');
            $table->increments('id');
           
            $table->string('estereopsis');
            
            //$table->primary('idFicha');
            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estereopsis');
    }
};
