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
        Schema::create('administrarclientes', function (Blueprint $table) {
            $table->unsignedInteger('idAuxiliar');
            $table->unsignedInteger('idCliente');
            $table->date('fecha');
            $table->foreign('idAuxiliar')->references('id')->on('auxiliares')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrarclientes');
    }
};
