<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        if (Estudiante::count() === 0) {
            Estudiante::factory()->count(10)->create();
        }
    }
}