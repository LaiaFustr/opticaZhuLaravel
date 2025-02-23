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
        Schema::create('bloque_horario', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('citasPosibles')->nullable();
            $table->date('fecha')->nullable();
/*             $table->unsignedInteger('calendario_id');
 */            $table->unsignedInteger('idOptica');

/*             $table->foreign('calendario_id')->references('id')->on('calendario')->onDelete('cascade')->onUpdate('cascade');
 */            $table->foreign('idOptica')->references('id')->on('opticas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloque_horario');
    }
};
