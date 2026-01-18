<?php

namespace Database\Factories;

use App\Models\AcquisitionMethod;
use App\Models\Artwork;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProvenanceRecords>
 */
class ProvenanceRecordFactory extends Factory
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
            'user_id' => User::pluck('id')->random(),
            'acquisition_date' => fake()->dateTime(),
            'sale_price' => rand(1000,100000),
            'acquisition_method_id' => AcquisitionMethod::pluck('id')->random(),
            'transfer_date' => fake()->date(),
            'sale_location' => fake()->country(),
            'sale_address' => fake()->address(),
            'owner_number' => 0,
        ];
    }
}
