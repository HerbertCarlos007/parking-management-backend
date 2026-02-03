<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OccupancyByHour extends Model
{
    protected $table = 'view_occupancy_by_hour';

    protected $fillable = [
        'hour_label',
        'total',
        'occupied',
        'available',
    ];
}
