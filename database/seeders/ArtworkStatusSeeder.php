<?php

namespace Database\Seeders;

use App\Models\ArtworkStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (ArtworkStatus::all()->count() == 0 ) {
            ArtworkStatus::create(['name' => 'Sold']);
            ArtworkStatus::create(['name' => 'Open']);
            ArtworkStatus::create(['name' => 'Unavailable']);
        }
    }
}
