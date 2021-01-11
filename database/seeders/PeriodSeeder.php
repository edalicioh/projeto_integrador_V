<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentClass = DB::table('student_Class')->get();

        foreach ($studentClass as $scls) {
            Period::factory()->create(['student_class_id' => $scls->id]);
        }
    }
}
