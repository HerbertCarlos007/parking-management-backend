<?php

namespace App\Models;

use App\Enums\SpotStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingSpot extends Model
{
    protected $fillable = [
        'code',
        'status',
        'id_parking_settings',
    ];

    protected $casts = [
        'status' => SpotStatus::class,
    ];

    protected $attributes = [
        'status' => SpotStatus::AVAILABLE
    ];

    public function parkingEntries(): HasMany
    {
        return $this->hasMany(ParkingEntry::class, 'spot_id', 'id');
    }
}
