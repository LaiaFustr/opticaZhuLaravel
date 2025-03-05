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
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nombre');
            $table->time('horaApertura');
            $table->time('horaCierre');
            //$table->date('festivos'); //HABLAR CON GEMA(a lo mejor hay que crear la TABLA festivos y aqui iria su clave principal)
            $table->unsignedInteger('idAdmin');
            
            //$table->unique(['nombre']);
            //??? Porque nombre debe ser unique?
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
