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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments("id");
            $table->date('fecha')->nullable();
            $table->enum('estado', ['pendiente', 'recibido', 'pagado', 'cancelado'])->default("pendiente")->nullable();
            $table->decimal('total')->nullable();
            $table->unsignedInteger("idProveedor")->nullable();
            $table->unsignedInteger("idOptica")->nullable();;
            $table->date('fechapago')->nullable();
            $table->timestamps();

            $table->foreign("idProveedor")->references("id")->on("proveedores")->onDelete("cascade")->onUpdate('cascade');
            $table->foreign("idOptica")->references("id")->on("opticas")->onDelete("cascade")->onUpdate("restrict");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
