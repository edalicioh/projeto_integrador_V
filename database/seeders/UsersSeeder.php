<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

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
            'full_name' => 'prof',
            'phone'     => 1111,
            'cpf'       => 111,
            'gender'    => 'M',
            'user_type' => Config::get('constants.USER_TYPE.PRO'),
            'email'     => 'admin@admin.com',
            'login'     => 'admin',
            'password' => bcrypt('password')
        ]);

        User::factory()->count(50)->create();
    }
}
