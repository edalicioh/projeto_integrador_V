<?php

namespace Database\Seeders;

use App\Models\Grades;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        foreach ($students as $student) {
            Grades::factory()->create(['student_id' => $student->id]);
        }
    }
}
