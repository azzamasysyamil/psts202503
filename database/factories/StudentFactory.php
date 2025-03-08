<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name(),
            'gender'=> $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'email'=> $this->faker->unique()->safeEmail(),
            'phone'=> $this->faker->phoneNumber(),
            'grade'=> 'XI U' . $this->faker->numberBetween(1, 10),
        ];
    }
}
