<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Agregar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Nuevo Producto</h3>

                    @if (session('success'))
                        <div class="alert alert-success mb-4" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; padding: 10px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #555; font-weight: 500;">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required style="border-radius: 5px; border: 1px solid #ced4da;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: #555; font-weight: 500;">Descripción</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" style="border-radius: 5px; border: 1px solid #ced4da;">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label" style="color: #555; font-weight: 500;">Precio</label>
                            <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required style="border-radius: 5px; border: 1px solid #ced4da;">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label" style="color: #555; font-weight: 500;">Imagen (opcional)</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*" style="border-radius: 5px; border: 1px solid #ced4da;">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary me-2" style="background-color: #6c757d; border: none; border-radius: 5px; padding: 10px 20px; color: #fff; text-decoration: none;">Cancelar</a>
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 5px; padding: 10px 20px; color: #fff;">Crear Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>