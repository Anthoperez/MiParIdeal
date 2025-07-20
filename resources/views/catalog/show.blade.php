<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a style="color: #333; text-align: end; font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem;" href="{{route('orders.index')}}">Volver</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">{{ $product->name }}</h3>

                    <div class="row">
                        <!-- Imagen del producto -->
                        <div class="col-md-6 mb-4">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-lg" alt="{{ $product->name }}" style="width: 100%; height: 400px; object-fit: cover; object-position: center; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);"
"
>
                            @else
                                <div style="width: 100%; height: 400px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                    <span style="color: #555; font-size: 1rem;">Sin imagen</span>
                                </div>
                            @endif
                        </div>

                        <!-- Detalles del producto -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="card-body text-center">
                                    <h4 class="card-title" style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">{{ $product->name }}</h4>
                                    <p class="card-text" style="color: #555; font-size: 1rem; margin-bottom: 1rem;">{{ $product->description }}</p>
                                    <p class="card-text" style="color: #333; font-weight: 500; font-size: 1.25rem; margin-bottom: 1rem;">${{ number_format($product->price, 2) }}</p>
                                    <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 1rem;">Taller: {{ $product->taller->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Separador -->
                    <hr class="my-6" style="border-top: 1px solid #e9ecef;">

                    <!-- Formulario de pedido -->
                    @auth
                        @if (Auth::user()->role === 'comprador')
                            <div class="bg-gray-50 p-5 rounded-lg" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px;">
                                <h4 style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem;">Realizar un pedido</h4>
                                <form method="POST" action="{{ route('orders.store', $product) }}">
                                    @csrf
                                    <div class="row g-4 align-items-end">
                                        <div class="col-md-6">
                                            <label for="quantity" class="form-label" style="color: #333; font-weight: 500; margin-bottom: 0.5rem;">Cantidad</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required style="border-radius: 8px; border: 1px solid #ced4da; padding: 12px; font-size: 0.9rem;">
                                            @error('quantity')
                                                <span class="text-danger" style="color: #dc3545; font-size: 0.9rem;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Hacer Pedido</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endauth
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
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
    </style>
</x-app-layout>