<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carritos = Carrito::where('user_id', Auth::id())->with('producto')->get();
        return view('carrito.index', compact('carritos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('carrito.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        Carrito::create([
            'user_id' => Auth::id(),
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $request->cantidad * $producto->precio,
        ]);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    public function destroy(Carrito $carrito)
    {
        if ($carrito->user_id != Auth::id()) {
            abort(403);
        }

        $carrito->delete();

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }
}
