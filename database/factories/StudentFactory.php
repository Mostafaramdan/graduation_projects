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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'is_active' => 1,
            'created_at' => now(),
            'password' => bcrypt('123456'),
            'student_ID'=>'4'.date('y').rand(10000,99999).'@hti.edu.eg'
        ];
    }
}
