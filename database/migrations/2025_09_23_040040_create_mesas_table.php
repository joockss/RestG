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
            $table->string('estado', ['libre', 'ocupado', 'reservado'])->default('libre');
            $table->timestamps();
            $table->bo();
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
