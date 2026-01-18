<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'total_spots' => $this->total_spots,
            'grace_period_minutes' => $this->grace_period_minutes,
            'opening_time' => $this->opening_time,
            'closing_time' => $this->closing_time,
            'hourly_rate' => $this->hourly_rate,
            'half_hour_rate' => $this->half_hour_rate,
            'daily_rate' => $this->daily_rate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
