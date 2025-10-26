<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'mesa_id',
        'nombre_cliente',
        'telefono',
        'fecha',    // ✅ Campo separado
        'hora',     // ✅ Campo separado
        'detalles'
    ];

    protected $casts = [
        'fecha' => 'date',  // ✅ Cast como date
        'hora' => 'datetime:H:i' // ✅ Cast como time
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    // ✅ Accessor para obtener fecha y hora formateadas juntas
    public function getFechaHoraFormateadaAttribute()
    {
        return $this->fecha->format('d/m/Y') . ' ' . $this->hora->format('H:i');
    }
}