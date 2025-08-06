<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('sucursal.index', compact('sucursales'));
    }

    public function create()
    {
        return view('sucursal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'id_direccion' => 'nullable|unique:sucursal,id_direccion',
            'capacidad' => 'nullable|integer|min:0',
        ]);

        Sucursal::create($request->all());

        return redirect()->route('sucursal.index')->with('success', 'Sucursal creada correctamente.');
    }

    public function show(Sucursal $sucursal)
    {
        return view('sucursal.show', compact('sucursal'));
    }

    public function edit(Sucursal $sucursal)
    {
        return view('sucursal.edit', compact('sucursal'));
    }

    public function update(Request $request, Sucursal $sucursal)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'id_direccion' => 'nullable|unique:sucursal,id_direccion,' . $sucursal->id_sucursal . ',id_sucursal',
            'capacidad' => 'nullable|integer|min:0',
        ]);

        $sucursal->update($request->all());

        return redirect()->route('sucursal.index')->with('success', 'Sucursal actualizada correctamente.');
    }

    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete();
        return redirect()->route('sucursal.index')->with('success', 'Sucursal eliminada correctamente.');
    }
}
