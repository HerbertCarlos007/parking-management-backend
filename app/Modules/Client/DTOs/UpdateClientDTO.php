<?php

namespace App\Modules\Client\DTOs;

class UpdateClientDTO
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $phone,
        public ?string $document_number,
        public ?string $plate,
        public ?string $car_brand,
        public ?string $color,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document_number' => $this->document_number,
            'plate' => $this->plate,
            'car_brand' => $this->car_brand,
            'color' => $this->color,
        ];
    }
}


