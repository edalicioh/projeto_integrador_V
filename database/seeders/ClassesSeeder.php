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


        foreach ($users as  $user) {
            $userClass = [
                'user_id' => $user['id'],
                'class_id' => random_int(1, count($classes)),
            ];

            DB::table('user_class')->insert($userClass);
        }
        foreach ($students as  $student) {
            $studentClass = [
                'student_id' => $student['id'],
                'class_id' => random_int(1, count($classes)),
            ];

            DB::table('student_Class')->insert($studentClass);
        }
    }
}
