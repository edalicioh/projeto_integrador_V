<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userClass =  DB::table('user_class')->get();

        foreach ($userClass as $ucls) {
            Note::factory()->create(['user_class_id' => $ucls->id]);
        }
    }
}
