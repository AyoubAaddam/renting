<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Suscripcion;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coches>
 */
class CochesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'matricula' => fake()->text(10), // Utiliza $this->faker en lugar de fake()
            'tipo' => fake()->text(10), // Utiliza $this->faker en lugar de fake()
            'marca' => fake()->text(10), // Utiliza $this->faker en lugar de fake()
            'etiqueta' => fake()->text(10), // Utiliza $this->faker en lugar de fake()
            'propietario_id' => User::factory(), // Elimina la coma extra
            'suscripcion_id' => Suscripcion::factory(), // Elimina la coma extra y corrige el nombre del modelo

        ];
    }
}
