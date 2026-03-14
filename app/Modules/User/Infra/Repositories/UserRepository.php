<?php

namespace App\Modules\User\Infra\Repositories;

use App\Modules\User\DTOs\CreateUserDTO;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User
    {
        return User::create($createUserDTO->toArray());
    }

    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function findByCompany(int $companyId): Collection
    {
        return User::where('id_company', $companyId)->get();
    }

}
