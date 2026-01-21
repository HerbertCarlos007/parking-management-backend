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
        $validated['id_company'] = auth()->user()->id_company;
        $parkingSpot = ParkingSpot::create($validated);
        return new ParkingSpotResource($parkingSpot);
    }

    public function index($idCompany)
    {
        $parkingSpots = ParkingSpot::where('id_company', $idCompany)->get();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsAvailables($idCompany)
    {
        $parkingSpots = ParkingSpot::where('status', SpotStatus::AVAILABLE)
            ->where('id_company', $idCompany)
            ->get();
        return ParkingSpotResource::collection($parkingSpots);
    }

    public function getParkingSpotsStatus($idCompany)
    {
        $spots = ParkingSpot::where('id_company', $idCompany)
            ->with([
                'parkingEntries' => function ($query) {
                    $query->orderBy('entered_at', 'desc')
                        ->limit(1);
                }
            ])
            ->get();

        return ParkingSpotResource::collection($spots);
    }


    public function getSpotsStats($idCompany)
    {
        $stats = ParkingSpotStats::where('id_company', $idCompany)
            ->first();
        return response()->json($stats);
    }


}
