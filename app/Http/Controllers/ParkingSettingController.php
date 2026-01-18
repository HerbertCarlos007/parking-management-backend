<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParkingSettingRequest;
use App\Http\Requests\StoreUpdateParkingSettingsRequest;
use App\Http\Requests\UpdateParkingSettingRequest;
use App\Http\Resources\ParkingSettingsResource;
use App\Models\ParkingSetting;

class ParkingSettingController extends Controller
{
    public function store(StoreUpdateParkingSettingsRequest $request)
    {
        $validated = $request->validated();
        $parkingSetting = ParkingSetting::create($validated);
        return new ParkingSettingsResource($parkingSetting);
    }

    public function index()
    {
        $parkingSettings = ParkingSetting::all();
        return ParkingSettingsResource::collection($parkingSettings);
    }
}
