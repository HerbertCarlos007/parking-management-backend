<?php

namespace App\Modules\Client\Infra\Contracts;

use App\Modules\Client\DTOs\CreateClientDTO;
use App\Modules\Client\Models\Client;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface
{
    public function create(CreateClientDTO $createClientDTO): Client;
    public function findClientsByCompany(int $companyId): Collection;
}
