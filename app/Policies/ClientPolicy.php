<?php

namespace App\Policies;

use App\Enums\Role;
use App\Modules\Client\Models\Client;
use App\Modules\User\Models\User;

class ClientPolicy
{

    public function viewAny(User $user, int $idCompany)
    {

        return $user->id_company === $idCompany;
    }

    public function update(User $user, Client $client)
    {
        return $user->id_company === $client->id_company
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

    public function delete(User $user, Client $client)
    {
        return $user->id_company === $client->id_company
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

}
