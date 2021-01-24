<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'phone'     => $this->faker->randomNumber(9, true),
            'cpf'       => $this->faker->randomNumber(9, true),
            'gender'    => $this->faker->randomElements(['M', 'F', 'O'])[0],
            'user_type' => random_int(1, 4),
            'email'     => $this->faker->unique()->email,
            'login'     => $this->faker->unique()->firstName,
            'password' => bcrypt('password')

        ];
    }
}
