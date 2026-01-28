<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(StoreUpdateClientRequest $request)
    {
        $validated = $request->validated();
        $validated['id_company'] = auth()->user()->id_company;
        $client = Client::create($validated);
        return new ClientResource($client);
    }

    public function index($idCompany)
    {
        $clients = Client::where('id_company', $idCompany)->get();
        return ClientResource::collection($clients);
    }

    public function update(Client $client, StoreUpdateClientRequest $request)
    {
        $validated = $request->validated();
        $client->update($validated);
        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
