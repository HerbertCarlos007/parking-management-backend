<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSetting extends Model
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
    ];
}
