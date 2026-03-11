<?php

namespace App\Modules\User\Infra\Repositories\Contracts;

use App\Modules\User\DTOs\CreateUserDTO;
use App\Modules\User\Models\User;

interface UserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User;
}
