<?php

namespace App\Http\Controllers;

use App\Models\ProveedorProducto;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorProductoController extends Controller
{
    public function index()
    {
        $relaciones = ProveedorProducto::with(['producto', 'proveedor'])->get();
        return view('proveedor_producto.index', compact('relaciones'));
    }

    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('proveedor_producto.create', compact('productos', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'precio_compra' => 'required|numeric|min:0',
            'cantidad_disponible' => 'required|integer|min:0',
        ]);

        ProveedorProducto::create($request->all());

        return redirect()->route('proveedor_producto.index')->with('success', 'Relación proveedor-producto creada.');
    }

    public function show(ProveedorProducto $proveedorProducto)
    {
        return view('proveedor_producto.show', compact('proveedorProducto'));
    }

    public function edit(ProveedorProducto $proveedorProducto)
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('proveedor_producto.edit', compact('proveedorProducto', 'productos', 'proveedores'));
    }

    public function update(Request $request, ProveedorProducto $proveedorProducto)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'precio_compra' => 'required|numeric|min:0',
            'cantidad_disponible' => 'required|integer|min:0',
        ]);

        $proveedorProducto->update($request->all());

        return redirect()->route('proveedor_producto.index')->with('success', 'Relación actualizada correctamente.');
    }

    public function destroy(ProveedorProducto $proveedorProducto)
    {
        $proveedorProducto->delete();
        return redirect()->route('proveedor_producto.index')->with('success', 'Relación eliminada.');
    }
}
