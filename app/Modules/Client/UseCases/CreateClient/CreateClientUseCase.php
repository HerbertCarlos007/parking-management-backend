<?php

namespace App\Modules\Client\UseCases\CreateClient;

use App\Modules\Client\DTOs\CreateClientDTO;
use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Models\Client;

class CreateClientUseCase
{
    private ClientRepositoryInterface $clientRepository;
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(CreateClientDTO $createClientDTO): Client
    {
        $client = $this->clientRepository->create($createClientDTO);
        return $client;
    }
}
