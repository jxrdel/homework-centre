<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate random dates within June 2024
        $startDate = $this->faker->dateTimeBetween('2024-06-01', '2024-06-30');
        $endDate = (clone $startDate)->modify('+'. rand(1, 5) .' days');


        $studentId = Student::inRandomOrder()->first()->StudentID;

        return [
            'Title' => $this->faker->city,
            'StartDate' => $startDate->format('Y-m-d'),
            'EndDate' => $endDate->format('Y-m-d'),
            'StudentID' => $studentId,
        ];
    }
}
