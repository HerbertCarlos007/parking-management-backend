<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingEntriesResource extends JsonResource
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
            'client_id' => $this->client_id,
            'plate' => $this->plate,
            'model' => $this->model,
            'color' => $this->color,
            'spot_id' => $this->spot_id,
            'status' => $this->status,
            'type_entry' => $this->type_entry,
            'entered_at' => $this->entered_at,
            'left_at' => $this->left_at,
            'price' => round($this->price, 2),
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
