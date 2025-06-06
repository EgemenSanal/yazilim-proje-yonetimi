<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $password = $this->faker->password();
        $hashedpassword = Hash::make($password);

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $hashedpassword,
            'role' => $this->faker->randomElement(['Teacher', 'Student']),
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
        ];
    }
}
