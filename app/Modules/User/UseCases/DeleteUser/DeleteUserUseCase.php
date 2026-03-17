<?php

namespace App\Modules\User\UseCases\DeleteUser;

use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;

class DeleteUserUseCase
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
