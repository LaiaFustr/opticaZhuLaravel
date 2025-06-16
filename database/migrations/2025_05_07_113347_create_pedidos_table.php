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
            $table->date('fecha');
            $table->enum('estado', ['pendiente', 'recibido', 'pagado', 'cancelado'])->default("pendiente");
            $table->decimal('total');
            $table->unsignedInteger("idProveedor");
            $table->unsignedInteger("idOptica");
            $table->date('fechapago')->nullable();
            $table->timestamps();

            $table->foreign("idProveedor")->references("id")->on("proveedores")->onDelete("cascade");
            $table->foreign("idOptica")->references("id")->on("opticas")->onDelete("cascade")->onUpdate("cascade");

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
