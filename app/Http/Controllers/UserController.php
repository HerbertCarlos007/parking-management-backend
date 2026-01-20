<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(StoreUpdateUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(StoreLoginRequest $request)
    {

        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $data['email'])->firstOrFail();
        return response()->json([
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer',
            'user' => new UserResource($user),
        ]);
    }

    public function index($idParkingSettings)
    {
        $users = User::where('id_parking_settings', $idParkingSettings)->get();
        return UserResource::collection($users);
    }

    public function update(User $user, StoreUpdateUserRequest $request)
    {
        $validated = $request->validated();
        $user->update($validated);
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
