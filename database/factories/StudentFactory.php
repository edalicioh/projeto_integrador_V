<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'date_birth' => $this->faker->date(),
            'registration' => $this->faker->randomNumber(6, true),
            'gender' => $this->faker->randomElements(['M', 'F', 'O'])[0],
        ];
    }
}
