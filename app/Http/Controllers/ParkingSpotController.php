<?php

namespace App\Http\Controllers;

use App\Enums\SpotStatus;
use App\Http\Requests\StoreUpdateParkingSpotRequest;
use App\Http\Resources\ParkingSpotResource;
use App\Models\ParkingSpot;
use App\Models\ParkingSpotStats;

class ParkingSpotController extends Controller
{
    public function store(StoreUpdateParkingSpotRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = SpotStatus::AVAILABLE;
        $parkingSpot = ParkingSpot::create($validated);
        return new ParkingSpotResource($parkingSpot);
    }

    public function index()
    {
        $parkingSpots = ParkingSpot::all();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsAvailables()
    {
        $parkingSpots = ParkingSpot::where('status', SpotStatus::AVAILABLE)->get();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsStatus()
    {
        $spots = ParkingSpot::with([
            'parkingEntries' => function ($query) {
                $query->orderBy('entered_at', 'desc')
                    ->limit(1);
            }
        ])->get();
        return ParkingSpotResource::collection($spots);
    }

    public function getSpotsStats()
    {
        $stats = ParkingSpotStats::first();
        return response()->json($stats);
    }

}
