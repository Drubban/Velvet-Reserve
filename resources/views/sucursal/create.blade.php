@extends('layouts.app')

@section('content')
<h1>Crear Sucursal</h1>

<form action="{{ route('sucursal.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}">
    @error('nombre')<div style="color:red">{{ $message }}</div>@enderror

    <label>ID Dirección (opcional):</label>
    <input type="text" name="id_direccion" value="{{ old('id_direccion') }}">
    @error('id_direccion')<div style="color:red">{{ $message }}</div>@enderror

    <label>Capacidad (opcional):</label>
    <input type="number" name="capacidad" value="{{ old('capacidad') }}">
    @error('capacidad')<div style="color:red">{{ $message }}</div>@enderror

    <button type="submit">Guardar</button>
</form>
@endsection
