<?php

namespace Database\Seeders;

use App\Models\AcquisitionMethod;
use App\Models\Category;
use App\Models\Medium;
use App\Models\User;
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


        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CollectionSeeder::class
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 

        // Medium::create([ 'name' => 'Oil' ]);
        // Medium::create([ 'name' => 'Acrylic' ]);
        // Medium::create([ 'name' => 'Mixed' ]);
        // Medium::create([ 'name' => 'Watercolor' ]);

        // Category::create(['name' => 'Impressionism']);
        // Category::create(['name' => 'Pointillism']);
        // Category::create(['name' => 'Contemporary']);
        // Category::create(['name' => 'Abstract']);
        // Category::create(['name' => 'Expressionism']);


        
    }
}
