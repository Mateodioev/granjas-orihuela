<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Sede;
use App\Models\User;

class SedePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function acceder(User $user, Sede $sede): bool
    {
        if ($user->hasRole([RolesEnum::ADMIN, RolesEnum::HR])) {
            return true;
        }

        if ($user->empleado->sede_id === $sede->id) {
            return true;
        }

        return $user->sedes()->where('sede_id', $sede->id)->exists();
    }
}
