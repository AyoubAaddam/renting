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
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id();
            $table->string('subscripcion');
            $table->foreignId('user_id')->references('id')->on('clientes')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_isbn')->references('isbn')->on('clientes')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('coche_id')->references('id')->on('coches')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripcions');
    }
};
