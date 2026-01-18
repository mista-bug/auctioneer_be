<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    /** @use HasFactory<\Database\Factories\BidFactory> */
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'artwork_id',
        'collection_id',
        'bid_method_id',
        'bidder_id',
        'bid_amount',
    ];
}
