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
            'branch' => 'Frontend',
            'skills' => '["uno", "dos", "tres"]'
        ]);
        DB::table('technologies')->insert([
            'language_id' => 2,
            'name' => 'Laravel',
            'description' => 'Framework',
            'branch' => 'Backend',
            'skills' => '["uno", "dos", "tres"]'
        ]);
        DB::table('technologies')->insert([
            'language_id' => 3,
            'name' => 'HTML',
            'description' => 'lenguage de etiquetado',
            'branch' => 'Backend',
            'skills' => '["uno", "dos", "tres"]'
        ]);
        DB::table('technologies')->insert([
            'language_id' => 3,
            'name' => 'CSS',
            'description' => 'lenguage de estilos',
            'branch' => 'Backend',
            'skills' => '["uno", "dos", "tres"]'
        ]);
        DB::table('technologies')->insert([
            'language_id' => 3,
            'name' => 'Bootstrap',
            'description' => 'Framework CSS',
            'branch' => 'Backend',
            'skills' => '["uno", "dos", "tres"]'
        ]);
    }
}
