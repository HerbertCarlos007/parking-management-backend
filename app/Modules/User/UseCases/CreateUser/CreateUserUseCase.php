<?php

namespace App\Modules\User\UseCases\CreateUser;

use App\Modules\User\DTOs\CreateUserDTO;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;

class CreateUserUseCase
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserDTO $dto): User
    {
        $user = $this->userRepository->create($dto);
        $user->token = $user->createToken('token')->plainTextToken;
        return $user;
    }
}
