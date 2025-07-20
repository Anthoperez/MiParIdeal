<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtro por nombre del producto
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filtro por rango de precio
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Filtro por taller
        if ($request->filled('taller_id')) {
            $query->where('taller_id', $request->input('taller_id'));
        }

        $products = $query->paginate(12);
        $talleres = User::where('role', 'taller')->get(); // Obtener todos los talleres para el filtro

        return view('catalog.index', compact('products', 'talleres'));
    }

    public function show(Product $product)
    {
        return view('catalog.show', compact('product'));
    }
}