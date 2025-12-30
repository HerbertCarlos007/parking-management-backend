<?php

namespace App\Http\Resources;

use App\Enums\SpotStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingSpotResource extends JsonResource
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
            'code' => $this->code,
            'status' => $this->status,
            'entry' => $this->when(
                $this->status === SpotStatus::OCCUPIED,
                new ParkingEntriesResource($this->parkingEntries->first())
            ),
        ];
    }
}
