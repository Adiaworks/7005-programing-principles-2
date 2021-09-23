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
        // \App\Models\User::factory(10)->create();
        $this->call(ManufacturersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        //this line calls the seeder we want to run. without this line the seeder we added won't work
        
    }
}
