<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $query = Reserva::with('mesa'); // <- Usa el with aquí para incluir la relación

        // 🔍 Aplicar filtrado por rango de fechas
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
             $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
        } elseif ($request->filled('fecha_inicio')) {
            $query->where('fecha', '>=', $request->fecha_inicio);
           } elseif ($request->filled('fecha_fin')) {
            $query->where('fecha', '<=', $request->fecha_fin);
            }

            // 🔽 Finalmente obtener resultados ordenados
         $reservas = $query
               ->orderBy('fecha', 'desc')
               ->orderBy('hora', 'desc')
                ->get();

            return view('reservas.index', compact('reservas'));
    }


    public function create()
    {
        // Solo traer mesas con estado 'libre'
        $mesas = Mesa::where('estado', 'libre')
                    ->where('reservable', true)
                    ->orderBy('numero', 'asc')
                    ->get();
        
        return view('reservas.create', compact('mesas'));
    }

    public function store(Request $request)
    {
        // ✅ CORREGIDO: Validar fecha y hora separadas
        $validated = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre_cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:9',
            'fecha' => 'required|date|after:today',  // ✅ Cambió de fecha_hora a fecha
            'hora' => 'required',                     // ✅ Agregado
            'detalles' => 'nullable|string|max:500'
        ]);

        // ✅ CORREGIDO: Crear con fecha y hora separadas
        Reserva::create([
            'mesa_id' => $validated['mesa_id'],
            'nombre_cliente' => $validated['nombre_cliente'],
            'telefono' => $validated['telefono'],
            'fecha' => $validated['fecha'],           // ✅ Cambió
            'hora' => $validated['hora'],             // ✅ Cambió
            'detalles' => $validated['detalles'],
        ]);
            $mesa = Mesa::find($validated['mesa_id']);
                if ($mesa) 
                {
                    $mesa->estado = 'reservado';
                    $mesa->save();
                    }

             return back()->with('success', 'Reserva exitosa. ¡Estaremos a su espera!'); //cambio nuevo
    }


    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $mesas = Mesa::orderBy('numero')->get();
        return view('reservas.edit', compact('reserva', 'mesas'));
    }

    public function update(Request $request, $id)
    {
        // ✅ CORREGIDO: Validar fecha y hora separadas
        $validated = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre_cliente' => 'required|string|max:255',
            'telefono' => 'required|string|max:9',
            'fecha' => 'required|date',               // ✅ Cambió de fecha_hora a fecha
            'hora' => 'required',                     // ✅ Agregado
            'detalles' => 'nullable|string|max:500'
        ]);

        $reserva = Reserva::findOrFail($id);
        
        // ✅ CORREGIDO: Actualizar con fecha y hora separadas
        $reserva->update([
            'mesa_id' => $validated['mesa_id'],
            'nombre_cliente' => $validated['nombre_cliente'],
            'telefono' => $validated['telefono'],
            'fecha' => $validated['fecha'],           // ✅ Cambió
            'hora' => $validated['hora'],             // ✅ Cambió
            'detalles' => $validated['detalles'],
        ]);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy($id)
    {
        Reserva::findOrFail($id)->delete();
        return redirect()->route('reservas.index')
            ->with('success', 'Reserva eliminada exitosamente.');
    }
}