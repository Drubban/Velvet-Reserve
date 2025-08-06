<!-- resources/views/sucursal/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Listado de Sucursales</h1>

<a href="{{ route('sucursal.create') }}">Crear Nueva Sucursal</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ID Dirección</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($sucursales as $sucursal)
        <tr>
            <td>{{ $sucursal->id_sucursal }}</td>
            <td>{{ $sucursal->nombre }}</td>
            <td>{{ $sucursal->id_direccion }}</td>
            <td>{{ $sucursal->capacidad }}</td>
            <td>
                <a href="{{ route('sucursal.edit', $sucursal->id_sucursal) }}">Editar</a>
                <form action="{{ route('sucursal.destroy', $sucursal->id_sucursal) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar esta sucursal?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
