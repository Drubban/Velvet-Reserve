@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Sucursales</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarSucursal">Agregar Sucursal</button>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->nombre }}</td>
                <td>{{ $sucursal->direccion_completa }}</td>
                <td>
                    <a href="{{ route('sucursales.edit', $sucursal->id) }}" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Agregar Sucursal -->
@include('sucursales.modals.create')

@endsection
