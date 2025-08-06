@extends('layouts.app')

@section('content')
<h1>Editar Sucursal</h1>

<form action="{{ route('sucursal.update', $sucursal->id_sucursal) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $sucursal->nombre) }}">
    @error('nombre')<div style="color:red">{{ $message }}</div>@enderror

    <label>ID Dirección (opcional):</label>
    <input type="text" name="id_direccion" value="{{ old('id_direccion', $sucursal->id_direccion) }}">
    @error('id_direccion')<div style="color:red">{{ $message }}</div>@enderror

    <label>Capacidad (opcional):</label>
    <input type="number" name="capacidad" value="{{ old('capacidad', $sucursal->capacidad) }}">
    @error('capacidad')<div style="color:red">{{ $message }}</div>@enderror

    <button type="submit">Actualizar</button>
</form>
@endsection
