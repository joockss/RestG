<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;

    protected $fillable = ['orden_id', 'plato', 'cantidad', 'precio_unitario', 'subtotal'];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
