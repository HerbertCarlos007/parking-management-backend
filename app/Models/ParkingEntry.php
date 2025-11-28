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
        'plate_number',
        'model',
        'color',
        'spot_id',
        'type_entry',
        'entered_at',
        'left_at',
        'price',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'type_entry' => EntryType::class,
        'status' => EntryStatus::class,
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function parkingSpot(): BelongsTo
    {
        return $this->belongsTo(ParkingSpot::class);
    }
}
