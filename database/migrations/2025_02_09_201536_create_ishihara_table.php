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
        Schema::create('ishihara', function (Blueprint $table) {
            $table->unsignedInteger('idFicha');
            $table->increments('id');
           
            $table->text('ishihara')->nullable();
            

            $table->foreign('idFicha')->references('id')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ishihara');
    }
};
