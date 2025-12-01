<?php

namespace App\Http\Controllers;

use App\Enums\EntryStatus;
use App\Http\Requests\StoreUpdateParkingEntriesRequest;
use App\Http\Resources\ParkingEntriesResource;
use App\Models\ParkingEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingEntriesController extends Controller
{
    public function store(StoreUpdateParkingEntriesRequest $request)
    {
        $validated = $request->validated();
        $parkingEntry = ParkingEntry::create($validated);

        return new ParkingEntriesResource($parkingEntry);

    }

    public function index()
    {
        $parkingEntries = ParkingEntry::all();
        return ParkingEntriesResource::collection($parkingEntries);
    }

    public function update(ParkingEntry $parkingEntry)
    {

        if ($parkingEntry->status === EntryStatus::CLOSED) {
            return response()->json([
                'message' => 'Esta entrada de estacionamento já está fechada.'
            ], 400);
        }

        $enteredAt = Carbon::parse($parkingEntry->entered_at);
        $leftAt = Carbon::now();
        $totalHoursParked = ceil($enteredAt->diffInMinutes($leftAt) / 60);

        $totalMinutesParked = $enteredAt->diffInMinutes($leftAt);

        if ($totalMinutesParked <= 15) {
            $calculatedPrice = 0;
        }else {
            $calculatedPrice = $totalHoursParked * 10;
        }

        $parkingEntry->update([
            'left_at' => $leftAt,
            'price' => $calculatedPrice,
            'status' => EntryStatus::CLOSED,
        ]);
        return new ParkingEntriesResource($parkingEntry);
    }

}
