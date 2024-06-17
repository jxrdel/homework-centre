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
            'StudentName' => $this->faker->name,
            'DOB' => $this->faker->date('Y-m-d', '2010-01-01'), // Random date of birth up to 2010
        ];
    }
}
