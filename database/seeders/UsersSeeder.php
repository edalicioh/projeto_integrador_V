<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'admin',
            'phone'     => 1111,
            'cpf'       => 111,
            'gender'    => 'M',
            'user_type' => 'COR',
            'email'     => 'admin@admin.com',
            'login'     => 'admin',
            'password' => bcrypt('password')
        ]);

        User::factory()->count(50)->create();
        User::factory()->count(50)->create([
            'user_type' => 'PAI'
        ]);
    }
}
