<?php

namespace App\Modules\Client\Infra\Repositories;

use App\Modules\Client\DTOs\CreateClientDTO;
use App\Modules\Client\DTOs\UpdateClientDTO;
use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Models\Client;
use Illuminate\Database\Eloquent\Collection;


class ClientRepository implements ClientRepositoryInterface
{
    public function create(CreateClientDTO $createClientDTO): Client
    {
        return Client::create($createClientDTO->toArray());
    }

    public function findClientsByCompany(int $companyId): Collection
    {
        return Client::where('id_company', $companyId)->get();
    }

    public function update(Client $client, UpdateClientDTO $updateClientDTO): Client
    {
        $data = $updateClientDTO->toArray();
        $client->update($data);
        return $client;
    }

    public function delete(Client $client): void
    {
        $client->delete();
    }
}
