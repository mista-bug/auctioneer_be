<?php

namespace Database\Seeders;

use App\Models\Medium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Medium::all()->count() == 0) {
            Medium::create(['name' => 'Oil']);
            Medium::create(['name' => 'Acrylic']);
            Medium::create(['name' => 'Mixed']);
            Medium::create(['name' => 'Watercolor']);
        }
    }
}
