<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Inicializar todas las variables con valores predeterminados
        $products_count = 0;
        $orders_pending = 0;
        $orders_processing = 0;
        $orders_shipped = 0;
        $orders_count = 0;

        if (Auth::user()->role === 'taller') {
            $products_count = Product::where('taller_id', Auth::id())->count();
            $orders_pending = Order::whereHas('product', function ($query) {
                $query->where('taller_id', Auth::id());
            })->where('status', 'pendiente')->count();
            $orders_processing = Order::whereHas('product', function ($query) {
                $query->where('taller_id', Auth::id());
            })->where('status', 'procesado')->count();
            $orders_shipped = Order::whereHas('product', function ($query) {
                $query->where('taller_id', Auth::id());
            })->where('status', 'enviado')->count();
        } else {
            $orders_count = Order::where('comprador_id', Auth::id())->count();
        }

        return view('dashboard', compact('products_count', 'orders_pending', 'orders_processing', 'orders_shipped', 'orders_count'));
    }
}