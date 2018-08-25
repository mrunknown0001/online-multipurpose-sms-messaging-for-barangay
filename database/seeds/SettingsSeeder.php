<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
        	'app_name' => 'Online Multipurpose SMS Messaging for Barangay',
        	'barangay_name' => 'Barangay Name'
        ]);
    }
}
