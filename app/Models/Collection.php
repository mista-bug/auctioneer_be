<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'event_id',
        'name',
        'start_date',
        'end_date',
        'location',
        'address',
        'description',
        'organizer_id',
    ];
}
