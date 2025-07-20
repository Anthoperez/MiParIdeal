<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Gestionar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600;">Tus Productos</h3>
                    <div class="d-flex justify-content-between align-items-center mb-6">
                        
                        <a href="{{ route('products.create') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 10px 20px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Crear Producto</a>
                    </div>
                    <p style="color: #555; font-size: 1rem; margin-bottom: 2rem;">Administra los productos artesanales que ofreces en el catálogo.</p>

                    @if (session('success'))
                        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; border-radius: 8px; padding: 15px; margin-bottom: 2rem;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($products->isEmpty())
                        <p style="color: #555; font-size: 1rem; text-align: center;">No tienes productos registrados. ¡Crea uno ahora!</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover" style="width: 100%; border-collapse: separate; border-spacing: 0; border: 1px solid #ced4da; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <thead style="background-color: #f8f9fa; color: #333;">
                                    <tr>
                                        <th style="padding: 12px; font-weight: 600; text-align: left;">Imagen</th>
                                        <th style="padding: 12px; font-weight: 600; text-align: left;">Nombre</th>
                                        <th style="padding: 12px; font-weight: 600; text-align: left;">Precio</th>
                                        <th style="padding: 12px; font-weight: 600; text-align: left;">Descripción</th>
                                        <th style="padding: 12px; font-weight: 600; text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr style="transition: background-color 0.2s ease;">
                                            <td style="padding: 12px; vertical-align: middle;">
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                                @else
                                                    <div style="width: 80px; height: 80px; background-color: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #555; font-size: 0.9rem;">Sin imagen</div>
                                                @endif
                                            </td>
                                            <td style="padding: 12px; vertical-align: middle; color: #333; font-weight: 500;">{{ $product->name }}</td>
                                            <td style="padding: 12px; vertical-align: middle; color: #333; font-weight: 500;">${{ number_format($product->price, 2) }}</td>
                                            <td style="padding: 12px; vertical-align: middle; color: #555; font-size: 0.95rem;">{{ Str::limit($product->description, 50) }}</td>
                                            <td style="padding: 12px; vertical-align: middle; text-align: center;">
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm" style="background-color: #3172cf; border: none; border-radius: 8px; padding: 6px 12px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Ver</a>
                                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm" style="background-color: #10bd87; border: none; border-radius: 8px; padding: 6px 12px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Editar</a>
                                                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" style="background-color: #d57932; border: none; border-radius: 8px; padding: 6px 12px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Eliminar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6 text-center">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f5f9;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .table th, .table td {
            border: 1px solid #ced4da;
        }
        .table th:first-child, .table td:first-child {
            border-left: none;
        }
        .table th:last-child, .table td:last-child {
            border-right: none;
        }
        .table thead th {
            border-top: none;
        }
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        .d-flex {
            display: flex;
        }
        .gap-3 {
            gap: 1rem;
        }
        .alert-success {
            transition: opacity 0.5s ease;
        }
    </style>
</x-app-layout>
