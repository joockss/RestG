<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Schema::table('reservas', function (Blueprint $table) {
    $table->date('fecha')->after('telefono');
});

Schema::table('reservas', function (Blueprint $table) {
    $table->time('hora')->after('fecha');
});