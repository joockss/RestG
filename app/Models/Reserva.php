<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['mesa_id', 'nombre_cliente', 'telefono', 'fecha_hora'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
