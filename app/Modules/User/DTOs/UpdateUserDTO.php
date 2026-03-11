<?php

namespace App\Modules\User\DTOs;

class UpdateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $phone_number,
        public string $role
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone_number' => $this->phone_number,
            'role' => $this->role
        ];
    }
}
