<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'Javascript',
        ]);
        DB::table('languages')->insert([
            'name' => 'PHP',
        ]);
        DB::table('languages')->insert([
            'name' => 'Others',
        ]);
    }
}
