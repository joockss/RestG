<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('mesa')->orderBy('fecha_hora','desc')->get();
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
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre_cliente' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);

        Mesa::create([
        'numero' => $request->numero,
        'capacidad' => $request->capacidad,
        'estado' => $request->estado,
        'reservable' => $request->has('reservable') ? 1 : 0
        ]);

        return redirect()->route('reservas.index')->with('success','Reserva creada.');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $mesas = Mesa::orderBy('numero')->get();
        return view('reservas.edit', compact('reserva','mesas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre_cliente' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->only('mesa_id','nombre_cliente','telefono','fecha_hora','estado'));

        return redirect()->route('reservas.index')->with('success','Reserva actualizada.');
    }

    public function destroy($id)
    {
        Reserva::findOrFail($id)->delete();
        return redirect()->route('reservas.index')->with('success','Reserva eliminada.');
    }
}
