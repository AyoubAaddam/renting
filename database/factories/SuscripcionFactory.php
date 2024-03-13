<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Coches;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\suscripcion>
 */
class SuscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subscripcion'=>fake()->text(10),
            'user_id' => User::factory(),
            'user_isbn' => User::factory(),
            'coche_id' => Coches::factory(),




        ];
    }
}
