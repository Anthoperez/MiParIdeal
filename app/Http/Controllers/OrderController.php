<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Notifications\OrderPlaced;
use App\Notifications\NewOrderReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('comprador_id', Auth::id())->paginate(10);
        return view('orders.index', compact('orders'));
    }
    
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $order = Order::create([
            'comprador_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->input('quantity'),
            'status' => 'pendiente',
        ]);

        // Enviar notificación al comprador
        $request->user()->notify(new OrderPlaced($order));

        // Enviar notificación al taller
        //$product->taller->notify(new NewOrderReceived($order));
        if ($product->taller) {
            $product->taller->notify((new NewOrderReceived($order))->delay(20));
        }

        return redirect()->route('catalog')->with('success', 'Pedido realizado exitosamente.');
    }

    


}
