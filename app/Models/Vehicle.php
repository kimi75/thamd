<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'type',
        'base_price',
        'rate_per_km',
        'rate_per_minute',
        'max_passengers',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}