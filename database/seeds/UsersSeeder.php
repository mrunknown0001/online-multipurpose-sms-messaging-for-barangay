<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_type_id' => 1,
        	'firstname' => 'FAdmin',
        	'lastname' => 'LAdmin',
        	'password' => bcrypt('password')
        ]);
    }
}
