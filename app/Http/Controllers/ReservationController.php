<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Cliente;
use App\Models\Sucursal;
use App\Models\TipoReservacion;
use App\Models\Salon; // asumido
use App\Models\Mesa;  // si tienes modelo mesas

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['cliente', 'salon', 'sucursal', 'tipoReservacion'])->get();

        return view('Reservaciones.index', compact('reservations'));
    }

    public function create()
    {
        $cliente = Cliente::all();
        // $sucursales = Sucursal::all();
        // $tipos = TipoReservacion::all();
        // $mesas = Mesa::all(); // si tienes mesas relacionadas, ajustar según modelo

        return view('Reservaciones.create', compact('clientes', 'sucursales', 'tipos', 'mesas'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id_cliente',
            'sucursal_id' => 'required|exists:sucursal,id_sucursal',
            'tipo_reservacion_id' => 'required|exists:tipo_reservacion,id_tipo_reservacion',
            'fecha' => 'required|date',
            'hora' => 'required',
            'cantidad_personas' => 'required|integer|min:1',
            'estado' => 'nullable|string|max:30',
            'observaciones' => 'nullable|string|max:100',
            'mesas' => 'array'  // si manejas mesas
        ]);

        $reservation = new Reservation();
        $reservation->id_cliente = $validated['cliente_id'];
        $reservation->id_sucursal = $validated['sucursal_id'];
        $reservation->id_tipo_reservacion = $validated['tipo_reservacion_id'];
        $reservation->fecha_reserva = $validated['fecha'];
        $reservation->hora_inicio = $validated['hora'];
        // Aquí asumo que `hora_fin` debe calcularse o ingresarse, ajustar según necesidad
        $reservation->hora_fin = date('H:i:s', strtotime($validated['hora']) + 3600); // 1 hora después (ejemplo)
        $reservation->cantidad_personas = $request->input('cantidad_personas', 1);
        $reservation->estado = $request->input('estado', 'Pendiente');
        $reservation->observaciones = $request->input('observaciones');
        $reservation->id_salon = $request->input('salon_id') ?? null; // si lo tienes en form

        $reservation->save();

        // Aquí puedes guardar mesas si tienes tabla pivot (no proporcionaste detalles)
        // if ($request->has('mesas')) {
        //     $reservation->mesas()->sync($request->input('mesas'));
        // }

        return redirect()->route('Reservaciones.index')->with('success', 'Reservación creada correctamente.');
    }

    public function show($id)
    {
        $reservacion = Reservation::with(['cliente', 'salon', 'sucursal', 'tipoReservacion'])->findOrFail($id);
        return view('Reservaciones.show', compact('reservacion'));
    }

    public function edit($id)
    {
        $reservacion = Reservation::findOrFail($id);
        $clientes = Cliente::all();
        // $sucursales = Sucursal::all();
        // $tipos = TipoReservacion::all();
        // $mesas = Mesa::all();

        return view('Reservaciones.edit', compact('reservacion', 'clientes', 'sucursales', 'tipos', 'mesas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id_cliente',
            'sucursal_id' => 'required|exists:sucursal,id_sucursal',
            'tipo_reservacion_id' => 'required|exists:tipo_reservacion,id_tipo_reservacion',
            'fecha' => 'required|date',
            'hora' => 'required',
            'cantidad_personas' => 'required|integer|min:1',
            'estado' => 'nullable|string|max:30',
            'observaciones' => 'nullable|string|max:100',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->id_cliente = $validated['cliente_id'];
        $reservation->id_sucursal = $validated['sucursal_id'];
        $reservation->id_tipo_reservacion = $validated['tipo_reservacion_id'];
        $reservation->fecha_reserva = $validated['fecha'];
        $reservation->hora_inicio = $validated['hora'];
        $reservation->hora_fin = date('H:i:s', strtotime($validated['hora']) + 3600);
        $reservation->cantidad_personas = $request->input('cantidad_personas', 1);
        $reservation->estado = $request->input('estado');
        $reservation->observaciones = $request->input('observaciones');
        $reservation->id_salon = $request->input('salon_id') ?? $reservation->id_salon;

        $reservation->save();

        return redirect()->route('Reservaciones.index')->with('success', 'Reservación actualizada.');
    }
}
