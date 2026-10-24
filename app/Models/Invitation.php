<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Guest;
use App\Models\Wish;

class Invitation extends Model
{
    protected $fillable = [
        'groom_name',
        'bride_name',
        'slug',
        'groom_photo',
        'bride_photo',
        'cover_photo',
        'akad_date',
        'akad_location',
        'akad_address',
        'reception_date',
        'reception_location',
        'reception_address',
        'google_maps_url',
        'story',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'akad_date' => 'datetime',
            'reception_date' => 'datetime',
            'is_published' => 'boolean',
        ];
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    public function wishes(): HasMany
    {
        return $this->hasMany(Wish::class);
    }
    public function rsvps()
{
    return $this->hasMany(\App\Models\Rsvp::class);
}
}
