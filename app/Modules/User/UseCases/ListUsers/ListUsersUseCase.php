<?php

namespace App\Modules\User\UseCases\ListUsers;

use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;

class ListUsersUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $companyId)
    {
        $users = $this->userRepository->findByCompany($companyId);

        return $users;
    }
}
