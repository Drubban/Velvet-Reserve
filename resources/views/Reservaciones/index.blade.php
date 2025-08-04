@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cliente</h1>

        <div class="card mb-4">
            <div class="card-body">
                {{-- <h5 class="card-title">{{ $cliente->nombre_cliente }} {{ $cliente->ap_paterno_cliente }} {{ $cliente->ap_materno_cliente }}</h5> --}}
                <p class="card-text"><strong>Email:</strong> {{ $cliente->email ?? 'No registrado' }}</p>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver al listado</a>
            </div>
        </div>

        <h2>Reservaciones del Cliente</h2>

        {{-- @if($cliente->reservaciones->isEmpty())
            <p>Este cliente no tiene reservaciones registradas.</p>
        @else --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Personas</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Sucursal</th>
                        <th>Salón</th>
                        <th>Tipo de Reservación</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($cliente->reservaciones as $reservacion) --}}
                        <tr>
                            <td>{{ $reservacion->fecha_reserva }}</td>
                            <td>{{ $reservacion->hora_inicio }}</td>
                            <td>{{ $reservacion->hora_fin }}</td>
                            <td>{{ $reservacion->cantidad_personas }}</td>
                            <td>{{ $reservacion->estado ?? 'N/A' }}</td>
                            <td>{{ $reservacion->observaciones ?? 'Ninguna' }}</td>
                            <td>{{ $reservacion->sucursal->nombre ?? 'Sin sucursal' }}</td>
                            <td>{{ $reservacion->salon->nombre ?? 'Sin salón' }}</td>
                            <td>{{ $reservacion->tipoReservacion->nombre ?? 'Sin tipo' }}</td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        {{-- @endif --}}
    </div>
@endsection
