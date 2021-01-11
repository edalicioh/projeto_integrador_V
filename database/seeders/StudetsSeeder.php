<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        $studets = Student::factory()->count(100)->create()->toArray();

        $users = User::where('user_type', 'PAI')->get()->toArray();

        foreach ($studets as  $student) {

            $userStudet = [
                'user_id' => random_int(1, count($users)),
                'student_id' => $student['id'],
            ];
            DB::table('studentHasUser')->insert($userStudet);
        }
    }
}
