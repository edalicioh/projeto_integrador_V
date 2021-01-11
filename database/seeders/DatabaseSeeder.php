<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new UsersSeeder())->run();
        (new StudetsSeeder())->run();
        (new ClassesSeeder())->run();
        (new NoteSeeder())->run();
        (new PeriodSeeder())->run();
        (new GradesSeeder())->run();
        (new FrequencySeeder())->run();
    }
}
