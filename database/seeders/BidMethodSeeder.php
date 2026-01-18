<?php

namespace Database\Seeders;

use App\Models\BidMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (BidMethod::all()->count() == 0) {
            BidMethod::create(['name' => 'Phone']);
            BidMethod::create(['name' => 'In-Person']);
            BidMethod::create(['name' => 'Online']);
        }
    }
}
