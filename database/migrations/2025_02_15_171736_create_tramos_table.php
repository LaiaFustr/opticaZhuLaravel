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
        Schema::create('tramos', function (Blueprint $table) {
            $table->increments('id');
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->enum('status', ['libre','ocupado'])->default('libre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramos');
    }
};
