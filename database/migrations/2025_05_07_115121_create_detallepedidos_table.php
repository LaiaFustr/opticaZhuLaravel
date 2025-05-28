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
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("idPedido");
            $table->unsignedInteger("idArticulo");
            $table->integer("cantidad");
            $table->decimal("precio", 10, 2);
            $table->decimal("subtotal", 12, 2);

            $table->foreign("idPedido")->references("id")->on("pedidos")->onDelete("cascade");
            $table->foreign("idArticulo")->references("id")->on("articulos")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallepedidos');
    }
};
