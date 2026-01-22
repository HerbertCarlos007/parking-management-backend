<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'document_number',
        'plate',
        'car_brand',
        'color',
        'id_company'
    ];

    public function parkingEntries(): HasMany
    {
        return $this->hasMany(ParkingEntry::class, 'client_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
