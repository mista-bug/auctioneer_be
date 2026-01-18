<?php

namespace Database\Factories;

use App\Models\ArtworkStatus;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Medium;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artist_id' => User::where('type_id',2)->pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
            'collection_id' => Collection::pluck('id')->random(),
            'owner_id' => User::pluck('id')->random(),
            'status_id' => ArtworkStatus::pluck('id')->random(),
            'title' => ucfirst(fake()->words(2,true)),
            'description' => fake()->paragraphs(1,true),
            'width' => fake()->numberBetween(10,70),
            'height' => fake()->numberBetween(10,70),
            'medium' => Medium::pluck('id')->random(),
            'image_url' => 'https://placehold.co/1000x1000',
            'acquisition_source' => null,
            'estimate_low' => 1000.00,
            'estimate_high' => fake()->numberBetween(1000,1000000),
            'starting_bid' => 1000.00,
            'reserve_price' => 1000.00,
            'lot_number' => fake()->numberBetween(),
            'artwork_created_at' => fake()->date(),
        ];
    }
}
