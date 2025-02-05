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
        Schema::create('opticas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion')->unique();
            $table->string('correo');
            $table->integer('num_Maquinas');
            $table->unsignedInteger('idAdmin');
            $table->unsignedInteger('idHorario');
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idHorario')->references('id')->on('horarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opticas');
    }
};
