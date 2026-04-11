<?php

namespace App\Modules\User\DTOs;

use App\Enums\Role;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $phone_number,
        public Role $role,
        public int $id_company
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'id_company' => $this->id_company,
        ];
    }
}
