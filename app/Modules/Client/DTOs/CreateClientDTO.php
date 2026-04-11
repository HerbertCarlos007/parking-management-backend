<?php

namespace App\Modules\Client\DTOs;

class CreateClientDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $document_number,
        public string $plate,
        public string $car_brand,
        public string $color,
        public string $id_company
    ) {}

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
            'id_company' => $this->id_company,
        ];
    }
}
