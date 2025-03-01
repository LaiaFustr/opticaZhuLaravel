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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('dni')->nullable();
            $table->string('direccion') ->nullable();
            $table->string('telefono') ->nullable();
            $table->string('correo') ->nullable();
            $table->string('nombreUsuario')->nullable();
            $table->string('contrasenia');
            $table->enum('rol', ['auxiliar','optometrista','admin']);
            $table->unsignedInteger('idOptica');
            $table->boolean('activo')->default(true);
            //$table->rememberToken()->nulleable();
/*             $table->timestamps();*/

            $table->foreign('idOptica')->references('id')->on('opticas')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('correo')->primary();
            $table->string('token');
            /* $table->timestamp('created_at')->nullable(); */
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
