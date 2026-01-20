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
        $validated['id_parking_settings'] = auth()->user()->id_parking_settings;
        $parkingSpot = ParkingSpot::create($validated);
        return new ParkingSpotResource($parkingSpot);
    }

    public function index($idParkingSettings)
    {
        $parkingSpots = ParkingSpot::where('id_parking_settings', $idParkingSettings)->get();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsAvailables($idParkingSettings)
    {
        $parkingSpots = ParkingSpot::where('status', SpotStatus::AVAILABLE)
            ->where('id_parking_settings', $idParkingSettings)
            ->get();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsStatus($idParkingSettings)
    {
        $spots = ParkingSpot::where('id_parking_settings', $idParkingSettings)
            ->with([
                'parkingEntries' => function ($query) {
                    $query->orderBy('entered_at', 'desc')
                        ->limit(1);
                }
            ])
            ->get();

        return ParkingSpotResource::collection($spots);
    }


    public function getSpotsStats($idParkingSettings)
    {
        $stats = ParkingSpotStats::where('id_parking_settings', $idParkingSettings)
            ->first();
        return response()->json($stats);
    }


}
