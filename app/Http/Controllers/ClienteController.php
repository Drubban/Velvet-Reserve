<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('Clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('Clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_cliente' => 'required|string|max:50',
            'ap_paterno_cliente' => 'nullable|string|max:50',
            'ap_materno_cliente' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:clientes,email',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::with([
            'reservaciones.sucursal',
            'reservaciones.salon',
            'reservaciones.tipoReservacion'
        ])->findOrFail($id);

        return view('Clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('Clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nombre_cliente' => 'required|string|max:50',
            'ap_paterno_cliente' => 'nullable|string|max:50',
            'ap_materno_cliente' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:clientes,email,' . $cliente->id_cliente . ',id_cliente',
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
