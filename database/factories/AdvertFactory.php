<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advert>
 */
class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(),
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(500, 1500),
            'profession' => $this->faker->realText(),
            'location' => $this->faker->address(),
            'lesson' => $this->faker->word()
        ];
    }
}
