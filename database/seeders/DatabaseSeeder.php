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
    	/**
    	* use all table seeder file 
    	*/
        \App\Models\Admin::factory()->create();
       
    }
}
