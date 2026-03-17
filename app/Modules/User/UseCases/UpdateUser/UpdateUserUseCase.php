<?php

namespace App\Modules\User\UseCases\UpdateUser;

use App\Modules\User\DTOs\UpdateUserDTO;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;

class UpdateUserUseCase
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(User $user, UpdateUserDTO $dto)
    {
        $user = $this->userRepository->update($user, $dto);
        return $user;
    }

}
