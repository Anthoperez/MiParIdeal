<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Explora nuestro catálogo</h3>

                    <!-- Formulario de filtros -->
                    <div class="bg-gray-50 p-5 rounded-lg mb-8" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px;">
                        <form method="GET" action="{{ route('catalog') }}">
                            <div class="row g-4 align-items-end" style="display: flex; justify-content: space-between;">
                                <div class="col-md-3">
                                    <label for="name" class="form-label" style="color: #333; font-weight: 500; margin-bottom: 0.5rem;">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ request('name') }}" placeholder="Buscar por nombre..." style="border-radius: 8px; border: 1px solid #ced4da; padding: 12px; font-size: 0.9rem;">
                                </div>
                                <div class="col-md-2">
                                    <label for="min_price" class="form-label" style="color: #333; font-weight: 500; margin-bottom: 0.5rem;">Precio Min</label>
                                    <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}" placeholder="Mín." style="border-radius: 8px; border: 1px solid #ced4da; padding: 12px; font-size: 0.9rem;">
                                </div>
                                <div class="col-md-2">
                                    <label for="max_price" class="form-label" style="color: #333; font-weight: 500; margin-bottom: 0.5rem;">Precio Max</label>
                                    <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}" placeholder="Máx." style="border-radius: 8px; border: 1px solid #ced4da; padding: 12px; font-size: 0.9rem;">
                                </div>
                                <div class="col-md-3">
                                    <label for="taller_id" class="form-label" style="color: #333; font-weight: 500; margin-bottom: 0.5rem;">Taller</label>
                                    <select name="taller_id" id="taller_id" class="form-select" style="border-radius: 8px; border: 1px solid #ced4da; padding: 12px; font-size: 0.9rem;">
                                        <option value="">Todos los talleres</option>
                                        @foreach ($talleres as $taller)
                                            <option value="{{ $taller->id }}" {{ request('taller_id') == $taller->id ? 'selected' : '' }}>{{ $taller->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Separador -->
                    <hr class="my-6" style="border-top: 1px solid #e9ecef;">

                    <!-- Productos -->
                    @if ($products->isEmpty())
                        <p style="color: #555; font-size: 1rem; text-align: center;">No hay productos disponibles en este momento.</p>
                    @else
                        @php $counter = 0; @endphp
                        @foreach ($products as $product)
                            @if ($counter % 3 == 0)
                                <div class="row mb-4">
                            @endif
                                <div class="col-md-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 220px; object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                        @else
                                            <div style="height: 220px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                                <span style="color: #555; font-size: 1rem;">Sin imagen</span>
                                            </div>
                                        @endif
                                        <div class="card-body text-center">
                                            <h5 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $product->name }}</h5>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 0.5rem;">{{ Str::limit($product->description, 80, '...') }}</p>
                                            <p class="card-text" style="color: #333; font-weight: 500; font-size: 1.1rem; margin-bottom: 0.5rem;">${{ number_format($product->price, 2) }}</p>
                                            <p class="card-text" style="color: #555; font-size: 0.9rem; margin-bottom: 0.75rem;">Taller: {{ $product->taller->name }}</p>
                                            <a href="{{ route('catalog.show', $product) }}" class="btn btn-primary w-100" style="background-color: #007bff; border: none; border-radius: 8px; padding: 10px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Ver Detalles</a>
                                        </div>
                                    </div>
                                </div>
                            @if ($counter % 3 == 2 || $loop->last)
                                </div>
                            @endif
                            @php $counter++; @endphp
                        @endforeach
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }
        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
    </style>
</x-app-layout>