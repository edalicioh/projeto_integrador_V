<?php

namespace Database\Seeders;

use App\Models\Frequency;
use App\Models\Student;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
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
            Frequency::factory()->create(['student_id' => $student->id]);
        }
    }
}
