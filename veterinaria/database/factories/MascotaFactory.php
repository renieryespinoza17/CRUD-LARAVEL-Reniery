<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    protected $model = Mascota::class;

    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->numerify('MAS-####'),
            'nombre' => fake()->firstName(),
            'especie' => fake()->randomElement(['perro', 'gato', 'otro']),
            'propietario' => fake()->name(),
            'fecha_nacimiento' => fake()
                ->dateTimeBetween('-15 years', 'now')
                ->format('Y-m-d'),
        ];
    }
}