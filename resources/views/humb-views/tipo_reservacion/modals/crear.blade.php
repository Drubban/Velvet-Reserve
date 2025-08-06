<div x-data="{ open: false }" @open-crear-modal.window="open = true">
    <button @click="open = true" class="btn btn-primary">Agregar tipo de reservación</button>

    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="open = false" class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Agregar tipo de reservación</h2>
            <form method="POST" action="{{ route('tipo_reservacion.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="w-full border rounded px-3 py-2 mt-1" required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
