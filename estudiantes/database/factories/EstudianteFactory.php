<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition(): array
    {
        return [
            'numero_cuenta' => fake()->unique()->numerify('20########'),
            'nombre' => fake()->name(),
            'correo' => fake()->unique()->safeEmail(),
            'fecha_nacimiento' => fake()
                ->dateTimeBetween('-40 years', '-17 years')
                ->format('Y-m-d'),
        ];
    }
}