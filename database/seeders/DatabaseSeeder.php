<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //defaults
        $this->call([
            ArtworkStatusSeeder::class,
            UserTypeSeeder::class,
            CategorySeeder::class,
            AcquisitionMethodSeeder::class,
            MediumSeeder::class,
            BidMethodSeeder::class,
        ]);
        
        $this->call([
            UserSeeder::class,
            CollectionSeeder::class,
            ArtworkSeeder::class,
            BidSeeder::class,
            ProvenanceRecordSeeder::class,
        ]);
    }
}
