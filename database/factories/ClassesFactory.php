<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'period' => $this->faker->randomElements(['M', 'V'])[0],
            'class_number' => $this->faker->randomNumber(3, true),
            'begins_class' => $this->faker->date(),
            'end_classes' => $this->faker->date(),
            'class_cycle' => random_int(1, 4),
        ];
    }
}
