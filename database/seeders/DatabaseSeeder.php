<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            Campuses_seed::class,
            Positions_seed::class,
            Users_seed::class,
            // Dpcs_seed::class,
            UrlSeed::class
        ]);
    }
}
