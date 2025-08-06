@foreach ($tipos as $tipo)
<div x-data="{ openDelete{{ $tipo->id }}: false }">
    <button @click="openDelete{{ $tipo->id }} = true" class="text-red-600 underline">Eliminar</button>

    <div x-show="openDelete{{ $tipo->id }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="openDelete{{ $tipo->id }} = false" class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4 text-red-600">¿Eliminar tipo de reservación?</h2>
            <p class="mb-4">Estás a punto de eliminar <strong>{{ $tipo->nombre }}</strong>. Esta acción no se puede deshacer.</p>
            <form method="POST" action="{{ route('tipo_reservacion.destroy', $tipo->id) }}">
                @csrf
                @method('DELETE')
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openDelete{{ $tipo->id }} = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
