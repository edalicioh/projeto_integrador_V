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
        (new ClassesSeeder())->run();
        (new StudetsSeeder())->run();
        (new NoteSeeder())->run();
        (new GradesSeeder())->run();
        (new FrequencySeeder())->run();
    }
}
