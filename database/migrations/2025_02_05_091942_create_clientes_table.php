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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('dni');
            $table->integer('codPostal');
            $table->string('telefono',15);
           /*  $table->unsignedInteger('idAdmin');
            //$table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade'); */
            //$table->primary('id');
            $table->unique('dni');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
