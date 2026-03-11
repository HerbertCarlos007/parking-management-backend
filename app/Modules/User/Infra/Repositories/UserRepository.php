<?php

namespace App\Modules\User\Infra\Repositories;

use App\Modules\User\DTOs\CreateUserDTO;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User
    {
        return User::create($createUserDTO->toArray());
    }
}
