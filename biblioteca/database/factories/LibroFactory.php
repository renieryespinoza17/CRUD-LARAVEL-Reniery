<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
   
     protected $model = Libro::class;
     
    public function definition(): array
    {
        return [
        'codigo' => fake()->unique()->numerify('LIB-####'),
        'titulo' =>fake()->words(3, true),
        'autor' =>fake()->name(),
        'anio_publicacion' => fake()->numberBetween(1450,(int) date('Y')),       
        ];
    }
}
