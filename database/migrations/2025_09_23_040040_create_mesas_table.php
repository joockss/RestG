<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){

        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique(); // número de mesa (ej: 1, 2, 3...)
            $table->integer('capacidad');        // cuántas personas entran
            $table->enum('estado', ['libre', 'ocupado', 'reservado'])->default('libre'); // ✅ CORREGIDO
            $table->timestamps();
            $table->boolean('reservable')->default(true); // si quieres checkbox, cámbialo a “reservable”
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
