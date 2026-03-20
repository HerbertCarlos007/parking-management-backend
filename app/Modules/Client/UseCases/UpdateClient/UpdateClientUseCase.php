<?php

namespace App\Modules\Client\UseCases\UpdateClient;

use App\Modules\Client\DTOs\UpdateClientDTO;
use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Models\Client;

class UpdateClientUseCase
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(Client $client, UpdateClientDTO $dto)
    {
        $client = $this->clientRepository->update($client, $dto);
        return $client;
    }
}
