@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Reservación</h2>
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @selected($reservation->cliente_id == $cliente->id)>{{ $cliente->nombre_completo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sucursal_id" class="form-label">Sucursal</label>
            <select name="sucursal_id" class="form-select">
                @foreach($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}" @selected($reservation->sucursal_id == $sucursal->id)>{{ $sucursal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="salon_id" class="form-label">Salón</label>
            <select name="salon_id" class="form-select">
                @foreach($salones as $salon)
                    <option value="{{ $salon->id }}" @selected($reservation->salon_id == $salon->id)>{{ $salon->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_reservacion_id" class="form-label">Tipo</label>
            <select name="tipo_reservacion_id" class="form-select">
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @selected($reservation->tipo_reservacion_id == $tipo->id)>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{ $reservation->fecha }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="hora_inicio">Hora inicio</label>
                <input type="time" name="hora_inicio" class="form-control" value="{{ $reservation->hora_inicio }}">
            </div>
            <div class="col-md-3 mb-3">
                <label for="hora_fin">Hora fin</label>
                <input type="time" name="hora_fin" class="form-control" value="{{ $reservation->hora_fin }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="personas">Personas</label>
            <input type="number" name="personas" class="form-control" value="{{ $reservation->personas }}">
        </div>

        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $reservation->observaciones }}</textarea>
        </div>

        <div class="mb-3">
            <label for="estado">Estado</label>
            <select name="estado" class="form-select">
                <option value="activo" @selected($reservation->estado === 'activo')>Activo</option>
                <option value="cancelado" @selected($reservation->estado === 'cancelado')>Cancelado</option>
                <option value="pagado" @selected($reservation->estado === 'pagado')>Pagado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
