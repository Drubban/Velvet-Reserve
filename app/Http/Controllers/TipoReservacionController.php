<?php

namespace App\Http\Controllers;

use App\Models\TipoReservacion;
use Illuminate\Http\Request;

class TipoReservacionController extends Controller
{
    // Mostrar todos los tipos de reservación
    public function index()
    {
        $tipos = TipoReservacion::all();
        return view('humb-views.tipo_reservacion.index', compact('tipos'));
    }

    // Guardar un nuevo tipo de reservación
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'concepto' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        TipoReservacion::create($request->all());

        return redirect()->route('tipo_reservacion.index')
            ->with('success', 'Tipo de reservación agregado correctamente.');
    }

    // Actualizar un tipo de reservación existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'concepto' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $tipo = TipoReservacion::findOrFail($id);
        $tipo->update($request->all());

        return redirect()->route('tipo_reservacion.index')
            ->with('success', 'Tipo de reservación actualizado correctamente.');
    }

    // Eliminar un tipo de reservación
    public function destroy($id)
    {
        $tipo = TipoReservacion::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipo_reservacion.index')
            ->with('success', 'Tipo de reservación eliminado correctamente.');
    }
}
