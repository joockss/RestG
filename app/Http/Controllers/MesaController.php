<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    // Mostrar todas las mesas
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }

    // Formulario para crear mesa
    public function create()
    {
        return view('mesas.create');
    }

    // Guardar nueva mesa
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:mesas',
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|string'
        ]);

        Mesa::create([
        'numero' => $request->numero,
        'capacidad' => $request->capacidad,
        'estado' => $request->estado,
        'reservable' => $request->has('reservable'), // ✅ convierte checkbox en booleano
        ]);

        return redirect()->route('mesas.index')
                         ->with('success', 'Mesa creada correctamente.');
    }

    // Mostrar una mesa específica
    public function show($id)
    {
        $mesa = Mesa::findOrFail($id);
        return view('mesas.show', compact('mesa'));
    }

    // Formulario para editar una mesa
    public function edit($id)
    {
        $mesa = Mesa::findOrFail($id);
        return view('mesas.edit', compact('mesa'));
    }

    // Actualizar mesa
   // app/Http/Controllers/MesaController.php

public function update(Request $request, $id)
{
    $mesa = Mesa::findOrFail($id);

    $request->validate([
        'estado' => 'required|in:libre,reservado,ocupado'
    ]);

    // IMPORTANTE: Los checkboxes solo envían valor cuando están marcados
    // Si no está marcado, no llega en el request
    $mesa->estado = $request->estado;
    $mesa->reservable = $request->has('reservable') ? 1 : 0; // ← Esta es la clave
    $mesa->save();

    return redirect()->route('mesas.index')
        ->with('success', 'Estado de la mesa actualizado correctamente');
}

    // Eliminar mesa
    public function destroy($id)
    {
        $mesa = Mesa::findOrFail($id);
        $mesa->delete();

        return redirect()->route('mesas.index')
                         ->with('success', 'Mesa eliminada ahora esta libre.(ELIMINADA)');
    }
}
