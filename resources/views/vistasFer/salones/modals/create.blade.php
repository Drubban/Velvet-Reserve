<div class="modal fade" id="modalAgregarSalon{{ $sucursal->id }}" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('salones.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Salón a {{ $sucursal->nombre }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="sucursal_id" value="{{ $sucursal->id }}">
          <div class="mb-3">
            <label class="form-label">Nombre del Salón</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Capacidad</label>
            <input type="number" class="form-control" name="capacidad" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
