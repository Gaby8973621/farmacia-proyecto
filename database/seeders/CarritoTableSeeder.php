<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrito;
use App\Models\User;
use App\Models\Producto;

class CarritoSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // usa el primer usuario que exista
        $producto = Producto::first(); // usa el primer producto que exista

        if ($user && $producto) {
            Carrito::create([
                'user_id' => $user->id,
                'producto_id' => $producto->id,
                'cantidad' => 2,
                'precio_unitario' => $producto->precio,
                'subtotal' => 2 * $producto->precio,
            ]);
        }
    }
}
