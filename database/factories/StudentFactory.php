<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    public function definition(): array
    {
        return [
            'student_name' => fake()->name(),
            'gender' =>fake()->randomElement(['male', 'female']),
            'phone' => $this->faker->unique()->numerify('+998 ## ### ## ##'),
        ];
    }
}
