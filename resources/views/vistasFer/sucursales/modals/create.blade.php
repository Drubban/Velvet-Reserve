<div class="modal fade" id="modalAgregarSucursal" tabindex="-1" aria-labelledby="modalAgregarSucursalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('sucursales.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarSucursalLabel">Agregar Sucursal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <!-- Selector o creador de dirección -->
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <select class="form-select" name="direccion_id">
              @foreach($direcciones as $direccion)
              <option value="{{ $direccion->id }}">{{ $direccion->calle }} #{{ $direccion->numero }}</option>
              @endforeach
            </select>
            <small><a href="#" data-bs-toggle="modal" data-bs-target="#modalCrearDireccion">Agregar nueva dirección</a></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
