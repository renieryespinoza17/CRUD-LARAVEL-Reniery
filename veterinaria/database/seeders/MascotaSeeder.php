<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    public function run(): void
    {
        if (Mascota::count() === 0) {
            Mascota::factory()->count(10)->create();
        }
    }
}