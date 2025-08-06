<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Tipos de Reservación</h6>
                            <p class="text-sm">Lista de todos los tipos disponibles</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#modalCrearTipoReservacion">
                                <span class="btn-inner--icon">
                                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                        <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                    </svg>
                                </span>
                                <span class="btn-inner--text">Agregar tipo</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 py-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-4">
                                        Nombre
                                    </th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                        Descripción
                                    </th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tipos as $tipo)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-sm font-weight-semibold mb-0">{{ $tipo->nombre }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm text-secondary mb-0">{{ $tipo->descripcion }}</p>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditarTipoReservacion{{ $tipo->id }}">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEliminarTipoReservacion{{ $tipo->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            No hay tipos de reservación registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="border-top py-3 px-3 d-flex align-items-center">
                        <p class="font-weight-semibold mb-0 text-dark text-sm">
                            Mostrando {{ $tipos->count() }} tipo(s)
                        </p>
                        <div class="ms-auto">
                            {{-- Agrega paginación aquí si usas ->paginate() --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modales --}}
    @include('humb-views.tipo_reservacion.modals.crear')
    @foreach($tipos as $tipo)
        @include('humb-views.tipo_reservacion.modals.editar', ['tipo' => $tipo])
        @include('humb-views.tipo_reservacion.modals.eliminar', ['tipo' => $tipo])
    @endforeach
</x-app-layout>
