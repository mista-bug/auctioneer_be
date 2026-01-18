<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (UserType::all()->count() == 0) {
            UserType::create(['name' => 'Organizer']);
            UserType::create(['name' => 'Artist']);
            UserType::create(['name' => 'Buyer']);
        }
    }
}
