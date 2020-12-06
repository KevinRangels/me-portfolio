<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            'language_id' => 1,
            'name' => 'Vuejs',
            'description' => 'Framework',
            'branch' => 'Frontend'
        ]);
        DB::table('technologies')->insert([
            'language_id' => 2,
            'name' => 'Laravel',
            'description' => 'Framework',
            'branch' => 'Backend'
        ]);
    }
}
