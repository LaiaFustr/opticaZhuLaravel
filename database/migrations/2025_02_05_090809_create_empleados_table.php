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
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('dni');
            $table->string('direccion',40);
            $table->string('telefono',15);//Preguntar tipo de dato
            $table->string('correo',25);
            $table->string('nombreUsuario',15);
            $table->enum('rol', ['auxiliar','optometrista']);
            $table->string('contrasenia');
            $table->unsignedInteger('idOptica')->nullable();
            $table->boolean('activo')->default(true);

            $table->foreign('idOptica')->references('id')->on('opticas')->onDelete('cascade')->onUpdate('cascade');


            //$table->primary('id');
            $table->unique('dni');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
