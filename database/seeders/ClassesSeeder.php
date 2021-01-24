<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = Classes::factory()->count(10)->create()->toArray();

        $users = User::where('user_type', Config::get('constants.USER_TYPE.PRO'))->get()->toArray();


        foreach ($users as  $user) {
            $userClass = [
                'user_id' => $user['id'],
                'class_id' => random_int(1, count($classes)),
            ];

            DB::table('user_class')->insert($userClass);
        }
    }
}
