<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ParkingEntriesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ParkingSpotController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/company', [CompanyController::class, 'store']);
Route::get('/company/{idCompany}', [CompanyController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function(){
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    Route::get('/users/{idCompany}', [UserController::class, 'index']);

    Route::post('/clients', [ClientController::class, 'store']);
    Route::get('/clients/{idCompany}', [ClientController::class, 'index']);
    Route::put('/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

    Route::post('/parking-spots', [ParkingSpotController::class, 'store']);
    Route::get('/parking-spots/{idCompany}', [ParkingSpotController::class, 'index']);
    Route::get('/parking-spots-available/{idCompany}', [ParkingSpotController::class, 'getParkingSpotsAvailables']);
    Route::get('/parking-spots-status/{idCompany}', [ParkingSpotController::class, 'getParkingSpotsStatus']);
    Route::get('/spots-stats/{idCompany}', [ParkingSpotController::class, 'getSpotsStats']);

    Route::post('/parking-entries', [ParkingEntriesController::class, 'store']);
    Route::get('/parking-entries/{status}/{idCompany}', [ParkingEntriesController::class, 'index']);
    Route::get('all-parking_entries/{idCompany}', [ParkingEntriesController::class, 'getAllParkingEntries']);
    Route::put('/parking-entries/{parkingEntry}', [ParkingEntriesController::class, 'update']);
});









