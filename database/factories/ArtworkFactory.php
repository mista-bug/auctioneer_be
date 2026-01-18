<?php

namespace Database\Factories;

use App\Models\Category;
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
            'artist_id' => User::all()->random()->first()->id,
            'category_id' => Category::all()->random()->first()->id,
            'owner_id' => User::all()->random()->first()->id,
            'status_id',
            'title',
            'description',
            'width',
            'height',
            'medium',
            'image_url',
            'acquisition_source',
            'estimate_low',
            'estimate_high',
            'starting_bid',
            'reserve_price',
            'lot_number',
            'artwork_created_at',
        ];
    }
}
