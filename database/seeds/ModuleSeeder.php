<?php

use Illuminate\Database\Seeder;

//Viveed
use App\Setting;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
        $setting = Setting::create(array(
            'id' => '1',
            'type' => 'schedule',
            'title'  =>  NULL,
            'logo'  =>  NULL,
            'description'  =>  NULL,
            'start_date'  =>  NULL,
            'end_date' => NULL,
            'init' => '0',
            'status' => '0'
        ));
    }
}
