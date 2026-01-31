<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    public function update(User $user, Company $company)
    {
       return $user->id === $company->id
           && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }

    public function destroy(User $user, Company $company)
    {
        return $user->id === $company->id
            && in_array($user->role, [Role::ADMIN, Role::MANAGER]);
    }
}
