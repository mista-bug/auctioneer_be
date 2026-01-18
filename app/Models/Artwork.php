<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    /** @use HasFactory<\Database\Factories\ArtworkFactory> */
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'artist_id',
        'category_id',
        'owner_id',
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
