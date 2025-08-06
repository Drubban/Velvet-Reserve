@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Salones por Sucursal</h2>
    @foreach($sucursales as $sucursal)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{ $sucursal->nombre }}</strong>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarSalon{{ $sucursal->id }}">Agregar Salón</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del Salón</th>
                        <th>Capacidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sucursal->salones as $salon)
                    <tr>
                        <td>{{ $salon->nombre }}</td>
                        <td>{{ $salon->capacidad }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalGestionarMesas{{ $salon->id }}">Gestionar Mesas</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Agregar Salón -->
    @include('salones.modals.create', ['sucursal' => $sucursal])

    <!-- Modal Gestionar Mesas -->
    @foreach($sucursal->salones as $salon)
        @include('mesas.modals.gestionar', ['salon' => $salon])
    @endforeach
    @endforeach
</div>
@endsection
