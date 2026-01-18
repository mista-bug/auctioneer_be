<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Validator;

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

    protected static function booted()
    {
        static::saving(function ($collection) {
            $collection->validate();
        });
    }

    public function validate(): void
    {
        $validator = Validator::make($this->attributes, [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'organizer_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function organizer() {
        return $this->belongsTo(User::class,'organizer_id');
    }

    public function artworks() {
        return $this->hasMany(Artwork::class,'collection_id');
    }
}
