@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Detalle de Reservación</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Cliente:</strong> {{ $reservation->cliente->nombre_completo }}</li>
        <li class="list-group-item"><strong>Sucursal:</strong> {{ $reservation->sucursal->nombre }}</li>
        <li class="list-group-item"><strong>Salón:</strong> {{ $reservation->salon->nombre }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $reservation->tipoReservacion->nombre }}</li>
        <li class="list-group-item"><strong>Fecha:</strong> {{ $reservation->fecha }}</li>
        <li class="list-group-item"><strong>Hora:</strong> {{ $reservation->hora_inicio }} - {{ $reservation->hora_fin }}</li>
        <li class="list-group-item"><strong>Personas:</strong> {{ $reservation->personas }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($reservation->estado) }}</li>
        <li class="list-group-item"><strong>Observaciones:</strong> {{ $reservation->observaciones }}</li>
    </ul>
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
