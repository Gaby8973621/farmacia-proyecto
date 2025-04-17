<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Medicamentos', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Vitaminas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Cuidado Personal', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
