<?php

namespace App\Modules\User\UseCases\CreateUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\StoreUserRequest;
use App\Modules\User\Requests\UpdateUserRequest;
use App\Modules\User\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private CreateUser $createUser;
    public function __construct(CreateUser $createUser)
    {
        $this->createUser = $createUser;
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->createUser->execute($request->toDTO());
        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $user->token,
            'token_type' => 'Bearer',
        ], 201);
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

    public function index($idCompany)
    {
        $this->authorize('viewAny', [User::class, $idCompany]);

        $users = User::where('id_company', $idCompany)->get();
        return UserResource::collection($users);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();
        $user->update($validated);
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        $user->delete();
        return response()->json(null, 204);
    }
}
