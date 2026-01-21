<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'total_spots',
        'grace_period_minutes',
        'opening_time',
        'closing_time',
        'hourly_rate',
        'half_hour_rate',
        'daily_rate',
        'document_number',
    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class, 'id_company');
    }

    public function parkingEntries(): HasMany
    {
        return $this->hasMany(ParkingEntry::class, 'id_company');
    }

    public function parkingSpots(): HasMany
    {
        return $this->hasMany(ParkingSpot::class, 'id_company');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_company');
    }
}
