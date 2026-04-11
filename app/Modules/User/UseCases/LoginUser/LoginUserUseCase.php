<?php

namespace App\Modules\User\UseCases\LoginUser;

use App\Modules\User\DTOs\LoginDTO;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginDTO $dto): User
    {
        $user = $this->userRepository->findByEmail($dto->email);

        if (! $user) {
            throw new \Exception('Credenciais inválidas');
        }

        if (! Hash::check($dto->password, $user->password)) {
            throw new \Exception('Unauthorized');
        }

        return $user;
    }
}
