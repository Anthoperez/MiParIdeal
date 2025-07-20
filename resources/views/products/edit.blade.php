<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Editar {{ $product->name }}</h3>
                    <p style="color: #555; font-size: 1rem; margin-bottom: 2rem;">Actualiza los detalles de tu producto artesanal.</p>

                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Imagen actual -->
                        @if ($product->image)
                            <div class="mb-6 text-center">
                                <h4 style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 1rem;">Imagen Actual</h4>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin: 0 auto;">
                            </div>
                        @else
                            <div class="mb-6 text-center">
                                <h4 style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 1rem;">Sin Imagen</h4>
                                <div style="width: 200px; height: 200px; background-color: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #555; font-size: 1rem; margin: 0 auto;">Sin imagen cargada</div>
                            </div>
                        @endif

                        <!-- Campo: Nombre -->
                        <div class="mb-6">
                            <label for="name" style="color: #333; font-size: 1rem; font-weight: 500; margin-bottom: 0.5rem; display: block;">Nombre del Producto</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.3s ease;" required>
                            @error('name')
                                <span class="text-danger" style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo: Descripción -->
                        <div class="mb-6">
                            <label for="description" style="color: #333; font-size: 1rem; font-weight: 500; margin-bottom: 0.5rem; display: block;">Descripción</label>
                            <textarea name="description" id="description" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.3s ease; min-height: 120px;" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <span class="text-danger" style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo: Precio -->
                        <div class="mb-6">
                            <label for="price" style="color: #333; font-size: 1rem; font-weight: 500; margin-bottom: 0.5rem; display: block;">Precio ($)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.3s ease;" required>
                            @error('price')
                                <span class="text-danger" style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo: Imagen -->
                        <div class="mb-6">
                            <label for="image" style="color: #333; font-size: 1rem; font-weight: 500; margin-bottom: 0.5rem; display: block;">Subir Nueva Imagen (Opcional)</label>
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 8px; font-size: 0.95rem;">
                            @error('image')
                                <span class="text-danger" style="color: #dc3545; font-size: 0.9rem; display: block; margin-top: 0.5rem;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botón de envío -->
                        <div class="text-center">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary me-2" style="background-color: #697078ff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Cancelar</a>
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 400; transition: background-color 0.3s ease;">Actualizar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-danger {
            transition: opacity 0.5s ease;
        }
    </style>
</x-app-layout>