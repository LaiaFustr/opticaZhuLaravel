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
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('dni', 9)->unique();
            $table->string('direccion',40);
            $table->string('telefono',15);
            $table->string('correo');
            $table->string('nombreUsuario');
            $table->string('contrasenia');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

