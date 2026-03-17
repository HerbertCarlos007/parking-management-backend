<?php

namespace App\Modules\User\DTOs;

use App\Enums\Role;

class UpdateUserDTO
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $password,
        public ?string $phone_number,
        public ?Role $role,
    )
    {
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone_number' => $this->phone_number,
            'role' => $this->role?->value,
        ], fn($value) => !is_null($value));
    }
}
