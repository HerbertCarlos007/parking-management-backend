<?php

namespace App\Models;

use App\Enums\EntryStatus;
use App\Enums\EntryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingEntry extends Model
{
    protected $fillable =  [
        'client_id',
        'plate',
        'model',
        'color',
        'spot_id',
        'type_entry',
        'entered_at',
        'left_at',
        'price',
        'status',
        'created_by',
        'duration',
        'is_paid',
        'id_parking_settings'
    ];

    protected $casts = [
        'type_entry' => EntryType::class,
        'status' => EntryStatus::class,
        'entered_at' => 'datetime',
        'left_at' => 'datetime',
        'is_paid' => 'boolean',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function parkingSpot(): BelongsTo
    {
        return $this->belongsTo(ParkingSpot::class, 'spot_id', 'id');
    }
}
