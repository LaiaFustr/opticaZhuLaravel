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
        Schema::create('reflejopupilar', function (Blueprint $table) {
            $table->unsignedInteger('idFicha');
            $table->increments('id');

            $table->boolean('iguales');
            $table->boolean('redondas');
            $table->boolean('reaccionan');
            $table->boolean('reaccLuz');
            $table->boolean('acomodacion');

            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reflejopupilar');
    }
};
