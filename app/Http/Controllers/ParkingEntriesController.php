<?php

namespace App\Http\Controllers;

use App\Enums\EntryStatus;
use App\Enums\SpotStatus;
use App\Http\Requests\StoreUpdateParkingEntriesRequest;
use App\Http\Resources\ParkingEntriesResource;
use App\Models\ParkingEntry;
use App\Models\ParkingSpot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingEntriesController extends Controller
{
    public function store(StoreUpdateParkingEntriesRequest $request)
    {
        $validated = $request->validated();

        $spotId = $validated['spot_id'];

        $validated['entered_at'] = now();
        $validated['status'] = EntryStatus::OPEN->value;
        $validated['created_by'] = 3;
        $parkingEntry = ParkingEntry::create($validated);
        ParkingSpot::where('id', $spotId)->update(['status' => SpotStatus::OCCUPIED->value]);

        return new ParkingEntriesResource($parkingEntry);

    }

    public function index($status)
    {
        $parkingEntries = ParkingEntry::with('client:id,name')
            ->where('status', $status)
            ->orderByDesc('entered_at')->get();
        return ParkingEntriesResource::collection($parkingEntries);
    }

    public function update(ParkingEntry $parkingEntry)
    {

        if ($parkingEntry->status === EntryStatus::CLOSED) {
            return response()->json([
                'message' => 'Esta entrada de estacionamento já está fechada.'
            ], 400);
        }

        $spotId = $parkingEntry->spot_id;

        $enteredAt = Carbon::parse($parkingEntry->entered_at);
        $leftAt = Carbon::now();
        $totalHoursParked = ceil($enteredAt->diffInMinutes($leftAt) / 60);

        $totalMinutesParked = $enteredAt->diffInMinutes($leftAt);

        if ($totalMinutesParked <= 15) {
            $calculatedPrice = 0;
        } else {
            $calculatedPrice = $totalHoursParked * 10;
        }

        ParkingSpot::where('id', $spotId)->update(['status' => SpotStatus::AVAILABLE->value]);

        $parkingEntry->update([
            'left_at' => $leftAt,
            'price' => $calculatedPrice,
            'status' => EntryStatus::CLOSED,
        ]);
        return new ParkingEntriesResource($parkingEntry);
    }

}
