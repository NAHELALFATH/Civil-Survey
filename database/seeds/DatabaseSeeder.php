<?php

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
        $this->call(AdminSeeder::class);
        // $this->call(TypeSeeder::class);
        // $this->call(CriteriaSeeder::class);
        // $this->call(SubCriteriaSeeder::class);
        // $this->call(AlternativeSeeder::class);
        $this->call(FromArraySeeder::class);
        $this->call(ResponseSeeder::class);
    }
}
