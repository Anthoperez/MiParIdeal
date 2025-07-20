<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para el catálogo
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{product}', [CatalogController::class, 'show'])->name('catalog.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para el CRUD de productos (solo talleres)
    Route::resource('products', ProductController::class)->middleware('taller');

    // Rutas para pedidos (solo talleres)
    Route::get('/orders/order', [ProductController::class, 'order'])->name('orders.order')->middleware('taller');
    Route::patch('/orders/{order}/status', [ProductController::class, 'updateOrderStatus'])->name('orders.updateStatus')->middleware('taller');

    // Ruta para crear pedidos (solo compradores)
    Route::post('/catalog/{product}/order', [OrderController::class, 'store'])->name('orders.store')->middleware('comprador');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('comprador');
});

require __DIR__.'/auth.php';