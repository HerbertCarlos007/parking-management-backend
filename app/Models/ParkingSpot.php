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
    ];

    protected $casts = [
        'status' => SpotStatus::class,
    ];

    public function parkingEntries(): HasMany
    {
        return $this->hasMany(ParkingEntry::class);
    }
}
