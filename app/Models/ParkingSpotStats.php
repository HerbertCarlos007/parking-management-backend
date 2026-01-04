<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSpotStats extends Model
{
    protected $table = 'view_parking_spots_stats';

    protected $fillable = [
        'available',
        'occupied',
        'total',
    ];
}
