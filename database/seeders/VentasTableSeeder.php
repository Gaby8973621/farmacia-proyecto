<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasTableSeeder extends Seeder
{
    public function run()
    {
        // Insertamos algunas ventas de ejemplo
        DB::table('ventas')->insert([
            [
                'cliente_id' => 1, // Luis Torres
                'empleado_id' => 1, // Carlos Ramírez
                'fecha' => now()->subDays(3), // Hace 3 días
                'total' => 25.00,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3)
            ],
            [
                'cliente_id' => 2, // María López
                'empleado_id' => 2, // Andrea Soto
                'fecha' => now()->subDay(), // Ayer
                'total' => 18.00,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay()
            ],
        ]);
    }
}
