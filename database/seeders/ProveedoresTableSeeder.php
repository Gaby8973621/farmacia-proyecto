<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            [
                'nombre' => 'Laboratorios Genéricos S.A.',
                'telefono' => '123-456-789',
                'direccion' => 'Zona Industrial 100',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Farmasupply SAC',
                'telefono' => '987-654-321',
                'direccion' => 'Av. Proveedores 345',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
