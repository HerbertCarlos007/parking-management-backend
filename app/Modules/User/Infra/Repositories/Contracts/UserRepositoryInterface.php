<?php

namespace App\Modules\User\Infra\Repositories\Contracts;

use App\Modules\User\DTOs\CreateUserDTO;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User;
    public function findByEmail(string $email): User;
    public function findByCompany(int $companyId): Collection;
}
