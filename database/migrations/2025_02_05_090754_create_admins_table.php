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
            $table->increments('id');
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('dni', 9);
            $table->string('direccion',40);
            $table->string('telefono',15);
            $table->string('correo');
            $table->string('nombreUsuario');
            $table->string('contrasenia');

            $table->primary('id');
            $table->unique('dni');

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

