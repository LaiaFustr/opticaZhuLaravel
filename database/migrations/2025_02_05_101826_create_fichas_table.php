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
        /* Schema::create('fichas', function (Blueprint $table) { */
            /* $table->increments('id');
            $table->unsignedInteger('idOptometrista');
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idCita');
            $table->date('fecha');
            $table->time('hora');
            $table->text('descripcion'); */
            //idAdmin quitado
            //$table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            /* $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade'); */
            //$table->foreign('idOptometrista')->references('id')->on('optometristas')->onDelete('cascade')->onUpdate('cascade');

            
        /* }); */
        Schema::table('fichas', function (Blueprint $table) {
            $table->integer('idOptometrista')->nullable()->change();
            $table->integer('idCliente')->nullable()->change();
            $table->integer('idCita')->nullable()->change();
            $table->date('fecha')->nullable()->change();
            $table->date('hora')->nullable()->change();
            $table->string('descripcion')->nullable()->change();
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
