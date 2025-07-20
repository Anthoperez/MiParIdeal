<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #333; font-weight: bold;">
            {{ __('Mi Par Ideal - Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->role === 'taller')
                        <!-- Panel para talleres -->
                        <div class="text-center">
                            <h3 class="mb-4" style="color: #333; font-size: 1.5rem; font-weight: 600;">
                                Bienvenido, {{ Auth::user()->name }} (Taller)
                            </h3>
                            <p class="mb-6" style="color: #555; font-size: 1rem;">
                                Gestiona tus productos artesanales y revisa los pedidos recibidos.
                            </p>

                            <!-- Resumen de estadísticas -->
                            <div class="row mb-6">
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Productos Creados</h4>
                                            <p class="card-text" style="color: #007bff; font-size: 1.5rem; font-weight: 500; margin-bottom: 0;">{{ $products_count }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Pedidos Pendientes</h4>
                                            <p class="card-text" style="color: #ffc107; font-size: 1.5rem; font-weight: 500; margin-bottom: 0;">{{ $orders_pending }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Pedidos Procesados</h4>
                                            <p class="card-text" style="color: #17a2b8; font-size: 1.5rem; font-weight: 500; margin-bottom: 0;">{{ $orders_processing }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Pedidos Enviados</h4>
                                            <p class="card-text" style="color: #28a745; font-size: 1.5rem; font-weight: 500; margin-bottom: 0;">{{ $orders_shipped }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Separador -->
                            <hr class="my-6" style="border-top: 1px solid #e9ecef;">

                            <!-- Acciones principales -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.75rem;">Gestionar Productos</h4>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 1rem;">Crea, edita o elimina tus productos artesanales.</p>
                                            <a href="{{ route('products.index') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Gestionar Productos</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.75rem;">Ver Pedidos Recibidos</h4>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 1rem;">Revisa y actualiza el estado de tus pedidos.</p>
                                            <a href="{{ route('orders.order') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Ver Pedidos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Panel para compradores -->
                        <div class="text-center">
                            <h3 class="mb-4" style="color: #333; font-size: 1.5rem; font-weight: 600;">
                                Bienvenido, {{ Auth::user()->name }} (Comprador)
                            </h3>
                            <p class="mb-6" style="color: #555; font-size: 1rem;">
                                Explora nuestro catálogo de calzado artesanal y revisa tus pedidos.
                            </p>

                            <!-- Resumen de pedidos -->
                            <div class="row mb-6">
                                <div class="col-md-12">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">Tus Pedidos</h4>
                                            <p class="card-text" style="color: #007bff; font-size: 1.5rem; font-weight: 500; margin-bottom: 0;">
                                                {{ isset($orders_count) ? $orders_count : 0 }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Separador -->
                            <hr class="my-6" style="border-top: 1px solid #e9ecef;">

                            <!-- Acciones principales -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.75rem;">Ver Catálogo</h4>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 1rem;">Explora productos artesanales.</p>
                                            <a href="{{ route('catalog') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Ver Catálogo</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.2s ease;">
                                        <div class="card-body text-center">
                                            <h4 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600; margin-bottom: 0.75rem;">Mis Pedidos</h4>
                                            <p class="card-text" style="color: #555; font-size: 0.95rem; margin-bottom: 1rem;">Revisa el estado de tus pedidos.</p>
                                            <a href="{{ route('orders.index') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 8px; padding: 12px 24px; color: #fff; font-weight: 500; transition: background-color 0.3s ease;">Mis Pedidos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        .col-md-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
        .col-md-12 {
            flex: 0 0 100%;
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
        .col-sm-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box;
        }
    </style>
</x-app-layout>