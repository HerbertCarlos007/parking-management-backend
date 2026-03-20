<?php

namespace App\Modules\Client\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Client\Models\Client;
use App\Modules\Client\Requests\StoreClientRequest;
use App\Modules\Client\Requests\UpdateClientRequest;
use App\Modules\Client\Resources\ClientResource;
use App\Modules\Client\UseCases\CreateClient\CreateClientUseCase;
use App\Modules\Client\UseCases\ListClients\ListClientsUseCase;
use App\Modules\Client\UseCases\UpdateClient\UpdateClientUseCase;

class ClientController extends Controller
{
    private CreateClientUseCase $createClient;
    private ListClientsUseCase $listClient;
    private UpdateClientUseCase $updateClient;

    public function __construct(CreateClientUseCase $createClient,
                                ListClientsUseCase  $listClient,
                                UpdateClientUseCase $updateClient)
    {
        $this->createClient = $createClient;
        $this->listClient = $listClient;
        $this->updateClient = $updateClient;
    }

    public function store(StoreClientRequest $request)
    {
        $client = $this->createClient->execute($request->toDTO());
        return new ClientResource($client);
    }

    public function index($idCompany)
    {
        $this->authorize('viewAny', [Client::class, $idCompany]);

        $clients = $this->listClient->execute($idCompany);
        return ClientResource::collection($clients);
    }

    public function update(Client $client, UpdateClientRequest $request)
    {
        $this->authorize('update', $client);

//        $validated = $request->validated();
//        $client->update($validated);

        $client = $this->updateClient->execute($client, $request->toDTO());
        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();
        return response()->json(null, 204);
    }
}
