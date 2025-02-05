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
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');//fecha de la cita
            $table->time('hora');//hora de la cita
            $table->string('descripcion',255);
            $table->unsignedInteger('idOptometrista');
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idAdmin');
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idOptometrista')->references('id')->on('optometristas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
