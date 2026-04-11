<?php

namespace App\Modules\Client\UseCases\DeleteClient;

use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Models\Client;

class DeleteClientUseCase
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(Client $client): void
    {
        $this->clientRepository->delete($client);
    }
}
