<?php

namespace Database\Seeders;

use App\Models\Grades;
use App\Models\Period;
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
        $periods = Period::all();

        foreach ($periods as $period) {
            Grades::factory()->create(['periods_id' => $period->id]);
        }
    }
}
