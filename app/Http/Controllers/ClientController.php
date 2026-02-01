<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();
        $validated['id_company'] = auth()->user()->id_company;
        $client = Client::create($validated);
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
