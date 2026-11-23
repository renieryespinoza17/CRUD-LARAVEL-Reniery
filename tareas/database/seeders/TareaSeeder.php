<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    public function run(): void
    {
        if (Tarea::count() === 0) {
            Tarea::factory()->count(10)->create();
        }
    }
}