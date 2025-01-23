<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->sentences(20, true),
            'price' => fake()->numberBetween(5, 15) * 10000,
            'level' => fake()->randomElement(["entry", "intermediate", "expert"]),
            'instructor_id' => User::factory()->instructorRole(),
            'program_id' => Program::factory(),
        ];
    }
}
