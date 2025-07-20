<?php

namespace App\Http\Controllers;


use App\Notifications\NewOrderReceived;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\OrderStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('taller_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image','mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data = $request->all();
        $data['taller_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Product $product)
    {
        if ($product->taller_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este producto.');
        }
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->taller_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este producto.');
        }
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->taller_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este producto.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image','mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        if ($product->taller_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este producto.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function order()
    {
        $orders = Order::whereHas('product', function ($query) {
            $query->where('taller_id', Auth::id());
        })->paginate(10);
        return view('orders.order', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        if ($order->product->taller_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este pedido.');
        }

        $request->validate([
            'status' => ['required', 'in:pendiente,procesado,enviado'],
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        // Enviar notificación al comprador
        $order->comprador->notify(new OrderStatusUpdated($order));

        return redirect()->route('orders.order')->with('success', 'Estado del pedido actualizado exitosamente.');
    }

    
}