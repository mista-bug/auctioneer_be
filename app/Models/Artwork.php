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
        'collection_id',
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
    public function collection(){
        return $this->belongsTo(Collection::class,'collection_id');
    }

    public function artist(){
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function status(){
        return $this->belongsTo(ArtworkStatus::class, 'status_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bids() {
        return $this->hasMany(Bid::class,'artwork_id','id');
    }
    public function medium() {
        return $this->hasMany(Bid::class,'medium','id');
    }
    
    public function provenance(){
        return $this->hasMany(ProvenanceRecord::class,'artwork_id');
    }
}
