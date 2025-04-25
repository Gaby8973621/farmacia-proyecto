<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProveedorProductoController;
use App\Http\Controllers\VentaController;

// Página de bienvenida (puedes personalizarla más tarde)
Route::get('/', function () {
    return view('welcome');
});

// Rutas de Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');


// Rutas de Proveedores
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

// Rutas de ProveedorProducto (relación)
Route::get('/proveedor-producto', [ProveedorProductoController::class, 'index'])->name('proveedor-producto.index');
Route::get('/proveedor-producto/create', [ProveedorProductoController::class, 'create'])->name('proveedor-producto.create');
Route::post('/proveedor-producto', [ProveedorProductoController::class, 'store'])->name('proveedor-producto.store');
Route::get('/proveedor-producto/{proveedorProducto}', [ProveedorProductoController::class, 'show'])->name('proveedor-producto.show');
Route::get('/proveedor-producto/{proveedorProducto}/edit', [ProveedorProductoController::class, 'edit'])->name('proveedor-producto.edit');
Route::put('/proveedor-producto/{proveedorProducto}', [ProveedorProductoController::class, 'update'])->name('proveedor-producto.update');
Route::delete('/proveedor-producto/{proveedorProducto}', [ProveedorProductoController::class, 'destroy'])->name('proveedor-producto.destroy');

// Rutas de Ventas
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');


