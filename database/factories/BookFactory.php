<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(18),
            'author' => $this->faker->name(),
            'description' => $this->faker->text(),
            'publisher' => $this->faker->company(),
            'year' => $this->faker->year(),
            'pages' => $this->faker->numberBetween(47,500),
            //'file_path' => $this->faker->imageUrl(),
            'cover_image' => $this->faker->imageUrl(),
        ];
    }
}
