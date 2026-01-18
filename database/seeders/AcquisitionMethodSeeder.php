<?php

namespace Database\Seeders;

use App\Models\AcquisitionMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcquisitionMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (AcquisitionMethod::all()->count() == 0) {
            AcquisitionMethod::create(['name' => 'In-Person']);
            AcquisitionMethod::create(['name' => 'Delivery']);
        }
    }
}
