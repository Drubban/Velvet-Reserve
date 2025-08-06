<!-- Modal de Crear Reservación -->
<div class="modal fade" id="createReservationModal" tabindex="-1" aria-labelledby="createReservationLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ route('Reservaciones.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createReservationLabel">Crear Nueva Reservación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

          <!-- Cliente -->
          <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id" required>
              <option selected disabled>Seleccionar cliente</option>
              @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
              @endforeach
            </select>
          </div>

          <!-- Sucursal -->
          <div class="mb-3">
            <label for="sucursal_id" class="form-label">Sucursal</label>
            <select class="form-select" name="sucursal_id" required>
              <option selected disabled>Seleccionar sucursal</option>
              @foreach($sucursales as $sucursal)
                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
              @endforeach
            </select>
          </div>

          <!-- Tipo de Reservación -->
          <div class="mb-3">
            <label for="tipo_reservacion_id" class="form-label">Tipo de Reservación</label>
            <select class="form-select" name="tipo_reservacion_id" required>
              <option selected disabled>Seleccionar tipo</option>
              @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
              @endforeach
            </select>
          </div>

          <!-- Fecha -->
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>

          <!-- Hora -->
          <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" name="hora" required>
          </div>

          <!-- Mesas (checkboxes) -->
          <div class="mb-3">
            <label class="form-label">Mesas</label><br>
            @foreach($mesas as $mesa)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="mesas[]" value="{{ $mesa->id }}" id="mesa{{ $mesa->id }}">
                <label class="form-check-label" for="mesa{{ $mesa->id }}">{{ $mesa->nombre }}</label>
              </div>
            @endforeach
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar Reservación</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
