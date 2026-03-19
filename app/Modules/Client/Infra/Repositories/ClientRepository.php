<?php

namespace App\Modules\Client\Infra\Repositories;

use App\Modules\Client\DTOs\CreateClientDTO;
use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Models\Client;


class ClientRepository implements ClientRepositoryInterface
{
    public function create(CreateClientDTO $createClientDTO): Client
    {
        return Client::create($createClientDTO->toArray());
    }
}
