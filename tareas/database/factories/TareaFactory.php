<?php

namespace Database\Factories;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->sentence(10),
            'responsable' => fake()->name(),
            'fecha_limite' => fake()
                ->dateTimeBetween('-30 days', '+60 days')
                ->format('Y-m-d'),
            'estado' => fake()->randomElement(
                ['pendiente', 'en proceso', 'completada']
            ),
        ];
    }
}