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
            $table->unsignedInteger('idEmpleado')->nullable();
            $table->unsignedInteger('idOptica')->nullable();
            $table->date('fecha')->nullable();
            $table->foreign('idEmpleado')->references('id')->on('users')->onDelete('set null')->onUpdate('restrict');
            $table->foreign('idOptica')->references('id')->on('opticas')->onDelete('set null')->onUpdate('restrict');
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
