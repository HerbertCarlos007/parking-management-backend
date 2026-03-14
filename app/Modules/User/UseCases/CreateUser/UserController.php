<?php

namespace App\Modules\User\UseCases\CreateUser;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\StoreLoginRequest;
use App\Modules\User\Requests\StoreUserRequest;
use App\Modules\User\Requests\UpdateUserRequest;
use App\Modules\User\Resources\UserResource;
use App\Modules\User\UseCases\ListUsers\ListUsersUseCase;
use App\Modules\User\UseCases\LoginUser\LoginUserUseCase;

class UserController extends Controller
{
    private CreateUserUseCase $createUser;
    private LoginUserUseCase $loginUser;
    private ListUsersUseCase $listUsers;
    public function __construct(CreateUserUseCase $createUser, LoginUserUseCase $loginUser, ListUsersUseCase $listUsers)
    {
        $this->createUser = $createUser;
        $this->loginUser = $loginUser;
        $this->listUsers = $listUsers;
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
        $dto = $request->toDTO();
        $user = $this->loginUser->execute($dto);

        return response()->json([
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer',
            'user' => new UserResource($user),
        ]);
    }

    public function index($idCompany)
    {
        $this->authorize('viewAny', [User::class, $idCompany]);

        $users = $this->listUsers->execute($idCompany);
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
