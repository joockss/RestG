<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $fillable = ['mesa_id', 'total', 'estado'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleOrden::class);
    }
}
