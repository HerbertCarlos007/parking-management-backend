<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ParkingEntriesController;
use App\Http\Controllers\ParkingSettingController;
use App\Http\Controllers\ParkingSpotController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/users/{idParkingSettings}', [UserController::class, 'index']);

Route::post('parking-settings', [ParkingSettingController::class, 'store']);
Route::get('parking-settings', [ParkingSettingController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function(){
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::post('/clients/{idParkingSettings}', [ClientController::class, 'store']);
    Route::get('/clients/{idParkingSettings}', [ClientController::class, 'index']);

    Route::post('/parking-spots', [ParkingSpotController::class, 'store']);
    Route::get('/parking-spots/{idParkingSettings}', [ParkingSpotController::class, 'index']);
    Route::get('/parking-spots-available/{idParkingSettings}', [ParkingSpotController::class, 'getParkingSpotsAvailables']);
    Route::get('/parking-spots-status/{idParkingSettings}', [ParkingSpotController::class, 'getParkingSpotsStatus']);
    Route::get('/spots-stats/{idParkingSettings}', [ParkingSpotController::class, 'getSpotsStats']);

    Route::post('/parking-entries', [ParkingEntriesController::class, 'store']);
    Route::get('/parking-entries/{status}/{idParkingSettings}', [ParkingEntriesController::class, 'index']);
    Route::get('all-parking_entries/{idParkingSettings}', [ParkingEntriesController::class, 'getAllParkingEntries']);
    Route::put('/parking-entries/{parkingEntry}', [ParkingEntriesController::class, 'update']);
});









