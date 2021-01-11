<?php

namespace Database\Seeders;

use App\Models\Frequency;
use App\Models\Period;
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
        $periods = Period::all();

        foreach ($periods as $period) {
            Frequency::factory()->create(['periods_id' => $period->id]);
        }
    }
}
