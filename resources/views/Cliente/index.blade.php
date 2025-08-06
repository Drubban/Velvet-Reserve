<!-- resources/views/Clientes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Listado de Clientes</h1>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->nombre_cliente }}</td>
                    <td>{{ $cliente->ap_paterno_cliente }}</td>
                    <td>{{ $cliente->ap_materno_cliente }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id_cliente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
