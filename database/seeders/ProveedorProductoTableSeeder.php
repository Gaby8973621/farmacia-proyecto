<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorProductoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedor_producto')->insert([
            [
                'proveedor_id' => 1, // Laboratorios Genéricos
                'producto_id' => 1,  // Paracetamol
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'proveedor_id' => 2, // Farmasupply
                'producto_id' => 2,  // Vitamina C
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
