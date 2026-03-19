<?php

namespace App\Modules\Client\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Client\Models\Client;
use App\Modules\Client\Requests\StoreClientRequest;
use App\Modules\Client\Requests\UpdateClientRequest;
use App\Modules\Client\Resources\ClientResource;
use App\Modules\Client\UseCases\CreateClient\CreateClientUseCase;

class ClientController extends Controller
{
    private CreateClientUseCase $createClient;

    public function __construct(CreateClientUseCase $createClient)
    {
        $this->createClient = $createClient;
    }

    public function store(StoreClientRequest $request)
    {
//        $validated = $request->validated();
//        $validated['id_company'] = auth()->user()->id_company;
//        $client = Client::create($validated);


        $client = $this->createClient->execute($request->toDTO());
        return new ClientResource($client);
    }

    public function index($idCompany)
    {
        $this->authorize('viewAny', [Client::class, $idCompany]);

        $clients = Client::where('id_company', $idCompany)->get();
        return ClientResource::collection($clients);
    }

    public function update(Client $client, UpdateClientRequest $request)
    {
        $this->authorize('update', $client);

        $validated = $request->validated();
        $client->update($validated);
        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();
        return response()->json(null, 204);
    }
}
