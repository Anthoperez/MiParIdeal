<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Mis Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Tus pedidos</h3>

                    @if ($orders->isEmpty())
                        <p style="color: #555; font-size: 1rem; text-align: center;">No tienes pedidos realizados en este momento.</p>
                    @else
                        <div class="row">
                            @foreach ($orders as $order)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $order->product->name }}</h5>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 0.5rem;">Cantidad: {{ $order->quantity }}</p>
                                            <p class="card-text" style="color: #333; font-weight: 500; font-size: 1.1rem; margin-bottom: 0.5rem;">Total: ${{ number_format($order->product->price * $order->quantity, 2) }}</p>
                                            <p class="card-text" style="color: #555; font-size: 0.9rem; margin-bottom: 0.5rem;">Estado: 
                                                <span style="color: {{ $order->status == 'pendiente' ? '#ffc107' : ($order->status == 'procesado' ? '#17a2b8' : '#28a745') }}; font-weight: 500">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </p>
                                            <p class="card-text" style="color: #555; font-size: 0.9rem; margin-bottom: 0.75rem;">Fecha: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                            <p class="card-text" style="color: #555; font-size: 0.9rem; margin-bottom: 0.75rem;">Taller: {{ $order->product->taller->name }}</p>
                                            <div class="text-center">
                                                <a href="{{ route('catalog.show', $order->product) }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 10px 20px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Ver Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 text-center">
                            {{ $orders->links() }}
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
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
    </style>
</x-app-layout>