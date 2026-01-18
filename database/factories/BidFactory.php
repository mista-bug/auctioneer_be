<?php

namespace Database\Factories;

use App\Models\AcquisitionMethod;
use App\Models\Artwork;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artwork_id' => Artwork::pluck('id')->random(),
            'collection_id' => Collection::pluck('id')->random(),
            'bid_method_id' => AcquisitionMethod::pluck('id')->random(),
            'bidder_id' => User::pluck('id')->random(),
            'bid_amount' => fake()->randomNumber(6),
        ];
    }
}
