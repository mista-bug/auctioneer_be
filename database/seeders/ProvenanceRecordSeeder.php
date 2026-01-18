<?php

namespace Database\Seeders;

use App\Models\ProvenanceRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvenanceRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProvenanceRecord::factory(rand(50,100))->create();
    }
}
