<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vivere>
 */
class VivereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "tipo_id"=>fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            "marca"=>fake()->name(),
            "quantidade"=>fake()->randomElement([10,3,12,13,111]),
        ];
    }
}
