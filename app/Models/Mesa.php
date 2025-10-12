<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'capacidad', 'estado','reservable'];

    protected $casts = [
        'reservable' => 'boolean'
    ];
    
    // Una mesa puede tener varias reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Una mesa puede tener varias ordenes
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
