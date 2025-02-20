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
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idOptometrista');
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idCita');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('idAdmin');//pendiente hablar con gema
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idOptometrista')->references('id')->on('optometristas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
