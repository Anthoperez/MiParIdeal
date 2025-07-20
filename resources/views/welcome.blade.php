<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mi Par Ideal') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Encabezado -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900" style="color: #333; font-weight: 700;">Bienvenido a Mi Par Ideal</h1>
                <p class="mt-2 text-lg text-gray-600" style="color: #555;">Conecta con talleres artesanales para encontrar el calzado perfecto, hecho a mano con pasión.</p>
            </div>
        </header>

        <!-- Contenido principal -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2 style="color: #333; font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">¿Qué es Mi Par Ideal?</h2>
                            <p style="color: #555; font-size: 1rem; margin-bottom: 1rem;">Mi Par Ideal es una plataforma que une a compradores con talleres de calzado artesanal. Explora una amplia variedad de productos únicos, realiza pedidos personalizados y recibe notificaciones en cada paso del proceso. Si eres un taller, gestiona tus productos y pedidos de manera sencilla.</p>
                            
                            <div class="row mt-4">
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 5px;">
                                        <div class="card-body">
                                            <h3 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600;">Para Compradores</h3>
                                            <p class="card-text" style="color: #555; font-size: 1rem;">Descubre calzado artesanal, filtra por precio o taller, y realiza pedidos con facilidad.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 5px;">
                                        <div class="card-body">
                                            <h3 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600;">Para Talleres</h3>
                                            <p class="card-text" style="color: #555; font-size: 1rem;">Crea y gestiona tus productos, recibe pedidos y actualiza su estado en tiempo real.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100" style="border: 1px solid #ced4da; border-radius: 5px;">
                                        <div class="card-body">
                                            <h3 class="card-title" style="color: #333; font-size: 1.25rem; font-weight: 600;">Conexión Directa</h3>
                                            <p class="card-text" style="color: #555; font-size: 1rem;">Una plataforma sencilla para conectar artesanos y compradores sin complicaciones.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-6">
                                <a href="{{ route('catalog') }}" class="btn btn-primary" style="background-color: #007bff; border: none; border-radius: 5px; padding: 10px 20px; color: #fff; text-decoration: none; font-size: 1.1rem;">Explora el Catálogo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>