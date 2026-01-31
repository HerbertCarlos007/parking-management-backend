<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    public function update(User $user, Client $client)
    {
        return $user->id === $client->id
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

    public function delete(User $user, Client $client)
    {
        return $user->id === $client->id
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

}
