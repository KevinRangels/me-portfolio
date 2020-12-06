<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'kevin',
            'age' => '27',
            'phone' => '+56 424 864 4310',
            'location' => 'Caracas',
            'email' => 'krangel107@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
