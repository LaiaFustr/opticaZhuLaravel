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
        Schema::create('asignaropticas', function (Blueprint $table) {
            $table->unsignedInteger('idEmpleado');
            $table->unsignedInteger('idOptica');
            $table->date('fecha');
            $table->foreign('idEmpleado')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idOptica')->references('id')->on('opticas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaropticas');
    }
};
