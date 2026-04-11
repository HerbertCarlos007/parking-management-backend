<?php

namespace App\Modules\Client\UseCases\ListClients;

use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;

class ListClientsUseCase
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(int $companyId)
    {
        $clients = $this->clientRepository->findClientsByCompany($companyId);

        return $clients;
    }
}
