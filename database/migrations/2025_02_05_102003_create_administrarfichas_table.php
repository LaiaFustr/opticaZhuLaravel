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
        Schema::create('administrarfichas', function (Blueprint $table) {
            $table->unsignedInteger('idOptometrista');
            $table->unsignedInteger('idFicha');
            $table->foreign('idOptometrista')->references('id')->on('optometristas');
            $table->foreign('idFicha')->references('id')->on('fichas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrarfichas');
    }
};
