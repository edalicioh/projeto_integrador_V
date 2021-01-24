<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class StudetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = Classes::all();


        for ($i = 0; $i < 300; $i++) {
            Student::factory()
                ->create(['class_id' => random_int(1, count($classes))])
                ->toArray();
        }

        $studets = Student::all();

        $users = User::where('user_type', Config::get('constants.USER_TYPE.PAI'))->get()->toArray();

        foreach ($studets as  $student) {

            $userStudet = [
                'user_id' => random_int(1, count($users)),
                'student_id' => $student['id'],
            ];
            DB::table('user_student')->insert($userStudet);
        }
    }
}
