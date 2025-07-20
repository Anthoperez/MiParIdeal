<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">{{ $product->name }}</h3>

                    <div class="mb-3">
                        <strong style="color: #555; font-weight: 500;">Descripción:</strong>
                        <p style="color: #555; font-size: 1rem;">{{ $product->description ?? 'Sin descripción' }}</p>
                    </div>

                    <div class="mb-3">
                        <strong style="color: #555; font-weight: 500;">Precio:</strong>
                        <p style="color: #555; font-size: 1rem;">${{ number_format($product->price, 2) }}</p>
                    </div>

                    @if ($product->image)
                        <div class="mb-3">
                            <strong style="color: #555; font-weight: 500;">Imagen:</strong>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 300px; border-radius: 5px; margin-top: 10px;">
                        </div>
                    @endif

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary me-2" style="background-color: #6c757d; border: none; border-radius: 5px; padding: 10px 20px; color: #fff; text-decoration: none;">Volver</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning" style="background-color: #ffc107; border: none; border-radius: 5px; padding: 10px 20px; color: #fff; text-decoration: none;">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>