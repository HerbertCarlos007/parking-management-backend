<?php

namespace App\Http\Controllers;

use App\Enums\SpotStatus;
use App\Http\Requests\StoreUpdateParkingSpotRequest;
use App\Http\Resources\ParkingSpotResource;
use App\Models\ParkingSpot;

class ParkingSpotController extends Controller
{
    public function store(StoreUpdateParkingSpotRequest $request)
    {
        $validated = $request->validated();
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
}
