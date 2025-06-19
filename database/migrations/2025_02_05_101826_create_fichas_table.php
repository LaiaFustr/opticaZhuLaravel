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
            $table->unsignedInteger('idOptometrista')->nullable();
            $table->unsignedInteger('idCliente')->nullable();
            $table->unsignedInteger('idCita')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->text('descripcion')->nullable();
            
            $table->foreign('idCita')->references('id')->on('citas')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('set null')->onUpdate('cascade');
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
