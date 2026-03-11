<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Client;
use App\Modules\User\Models\User;

class ClientPolicy
{

    public function viewAny(User $user, int $idCompany)
    {

        return $user->id_company === $idCompany;
    }

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
