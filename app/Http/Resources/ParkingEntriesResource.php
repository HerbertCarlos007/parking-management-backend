<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'client_name' => $this->whenLoaded('client', function () {
                return $this->client->name;
            }),
            'plate' => $this->plate,
            'model' => $this->model,
            'color' => $this->color,
            'spot_id' => $this->spot_id,
            'status' => $this->status,
            'type_entry' => $this->type_entry,
            'entered_at' => Carbon::make($this->entered_at)->format('d-m-y H:i'),
            'left_at' => $this->left_at ? Carbon::make($this->left_at)->format('d-m-y H:i') : null,
            'price' => number_format($this->price, 2, ',', '.'),
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
