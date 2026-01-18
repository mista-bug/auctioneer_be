<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::all()->count() == 0) {
            Category::create(['name' => 'Impressionism']);
            Category::create(['name' => 'Pointillism']);
            Category::create(['name' => 'Contemporary']);
            Category::create(['name' => 'Abstract']);
            Category::create(['name' => 'Expressionism']);
        }
    }
}
