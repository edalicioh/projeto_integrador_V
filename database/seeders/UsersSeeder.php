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
        $user = [
            'full_name' => "coordenação",
            'phone'     => '21212121',
            'cpf'       => '212121',
            'gender'    =>  'M',
            'user_type' => 'PRO',
            'email' => 'cor@cor.com',
            'login' => "pro",
            'password' => bcrypt('cor'),

        ];

        User::create($user);
    }
}
