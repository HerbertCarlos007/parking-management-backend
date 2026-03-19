<?php

namespace App\Modules\Client\Infra\Contracts;

use App\Modules\Client\DTOs\CreateClientDTO;
use App\Modules\Client\Models\Client;

interface ClientRepositoryInterface
{
    public function create(CreateClientDTO $createClientDTO): Client;
}
