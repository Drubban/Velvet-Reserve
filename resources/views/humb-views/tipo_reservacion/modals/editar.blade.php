@foreach ($tipos as $tipo)
<div x-data="{ openEdit{{ $tipo->id }}: false }">
    <button @click="openEdit{{ $tipo->id }} = true" class="text-blue-600 underline">Editar</button>

    <div x-show="openEdit{{ $tipo->id }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="openEdit{{ $tipo->id }} = false" class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Editar tipo de reservación</h2>
            <form method="POST" action="{{ route('tipo_reservacion.update', $tipo->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre_{{ $tipo->id }}" class="block text-sm font-medium">Nombre</label>
                    <input type="text" name="nombre" id="nombre_{{ $tipo->id }}" value="{{ $tipo->nombre }}" class="w-full border rounded px-3 py-2 mt-1" required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openEdit{{ $tipo->id }} = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
