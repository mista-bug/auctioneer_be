<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvenanceRecord extends Model
{
    /** @use HasFactory<\Database\Factories\ProvenanceRecordFactory> */
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'artwork_id',
        'collection_id',
        'user_id',
        'acquisition_date',
        'sale_price',
        'acquisition_method_id',
        'transfer_date',
        'sale_location',
        'sale_address',
        'owner_number',
    ];
}
