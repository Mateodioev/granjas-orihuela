<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Schema\PublicUserSchema;
use App\Services\ApisNetClient;
use Illuminate\Http\Request;

class RetrievePublicUserInformation extends Controller
{
    public function findByDni(string $dni)
    {
        $user = User::where('dni', $dni)->first()
            ?? new ApisNetClient()->dni($dni);
        if ($user instanceof User) {
            return PublicUserSchema::fromUserModel($user);
        }

        return $user;
    }
}
