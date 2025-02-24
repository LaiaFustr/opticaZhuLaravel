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
        Schema::create('visualizarfichas', function (Blueprint $table) {
            $table->unsignedInteger('idEmpleado');
            $table->unsignedInteger('idFicha');
            $table->foreign('idEmpleado')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visualizarfichas');
    }
};
