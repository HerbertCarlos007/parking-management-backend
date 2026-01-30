<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function update(User $user, User $model)
    {
        return $user->id_company === $model->id_company
           && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

    public function destroy(User $user, User $model)
    {
        return $user->id_company === $model->id_company
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

}
