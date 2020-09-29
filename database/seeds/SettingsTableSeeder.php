<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Intensewire',
            'address' => 'Long Beach, California',
            'contact_number' => '562 999 666 265',
            'contact_email' => 'info@intensewire.com'
        ]);
    }
}
