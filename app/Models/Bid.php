<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Validator;

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

    protected static function booted()
    {
        static::saving(function ($bid) {
            $bid->validate();
        });
    }

    public function validate(){
        $validator = Validator::make($this->attributes, [
            'artwork_id' => 'required|integer|exists:artworks,id',
            'collection_id' => 'required|integer|exists:collections,id',
            'bid_method_id' => 'required|integer|exists:bid_methods,id',
            'bidder_id' => 'required|integer|exists:users,id',
            'bid_amount' => 'required|decimal:2',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function artwork() {
        return $this->belongsTo(Artwork::class,'artwork_id');
    }

    public function collection() {
        return $this->belongsTo(Collection::class, 'collection_id');
    }
    
    public function method() {
        return $this->belongsTo(BidMethod::class, 'bid_method_id');
    }

    public function bidder() {
        return $this->belongsTo(User::class, 'bidder_id');
    }



}
