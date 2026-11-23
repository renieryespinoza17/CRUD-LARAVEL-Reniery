<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        if (Producto::count() === 0) {
            Producto::factory()->count(10)->create();
        }
    }
}