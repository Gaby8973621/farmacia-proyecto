<?php

use App\Http\Controllers\Api\CreatePermissionRolController;
use App\Http\Controllers\Api\CreatePrimissionRolController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;

 gabriela

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VentaController;

master

Route::prefix('auth')->group(function (){
    Route::post('login', [AuthController::class,'login']);

    Route::post('refresh-token', [AuthController::class,'refresh']);
    Route::post('register',[AuthController::class,'register']);
});

Route::middleware('auth:api')->prefix('users')->group(function (){
    Route::get('/role',[CreatePermissionRolController::class, 'getRole'])->middleware('rol:Super Admin');
    Route::post('/permissions',[CreatePermissionRolController::class,'createPermissionsAction'])->middleware('rol:Super Admin,Admin');
    Route::post('/role',[CreatePermissionRolController::class,'store'])->middleware('rol:Super Admin');

});


Route::middleware('auth:api')->group(function () {
    Route::get('/admin-dashboard', function () {
        return response()->json(['message' => 'Welcome to the admin dashboard']);
    })->middleware('rol:Admin,Super Admin');
});


Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::post('logout', [AuthController::class,'logout']);
});



 gabriela

   master
// Rutas de Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');


 gabriela
 master
// Rutas de Ventas
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');

 gabriela


//ellie

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Productos
Route::resource('productos', ProductoController::class);

// Categorías
Route::resource('categorias', CategoriaController::class);

// Carrito
Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');

// Pedidos
Route::post('pedido/crear', [PedidoController::class, 'crear'])->name('pedido.crear');

// Autenticación
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
});
 master
