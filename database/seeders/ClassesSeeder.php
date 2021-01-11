<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\User;
use App\Models\Student;

use Illuminate\Database\Seeder;
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

        $users = User::where('user_type', 'PRO')->get()->toArray();

        $students = Student::all()->toArray();


        foreach ($classes as  $class) {

            $userClass = [
                'user_id' => random_int(1, count($users)),
                'class_id' => $class['id'],
            ];
            $studentClass = [
                'student_id' => random_int(1, count($students)),
                'class_id' => $class['id'],
            ];

            DB::table('user_class')->insert($userClass);
            DB::table('student_Class')->insert($studentClass);
        }
    }
}
