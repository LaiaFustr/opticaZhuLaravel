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
        Schema::create('visualizarclientes', function (Blueprint $table) {
            $table->unsignedInteger('idEmpleado');
            $table->unsignedInteger('idCita');
            //$table->primary(['idUsuario', 'idCita']); Esto haria que la combinacion de idUsuario e idCita no se pueda repetir, es decir, solo una vez existiria 1 y 3, hay que verlo
            $table->foreign('idEmpleado')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idCita')->references('id')->on('citas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visualizarclientes');
    }
};
