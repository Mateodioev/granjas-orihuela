<?php

declare(strict_types=1);

namespace App\Schema;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

final class PublicUserSchema extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'celular',
        'email',
    ];

    public static function fromApisNetResponse(array $response): PublicUserSchema
    {
        return new PublicUserSchema([
            'nombre' => $response['nombres'],
            'apellidos' => $response['apellidoPaterno'] . ' ' . $response['apellidoMaterno'],
            'celular' => '',
            'email' => '',
        ]);
    }

    public static function fromUserModel(User $user): PublicUserSchema
    {
        return new PublicUserSchema([
            'nombre' => $user->nombre,
            'apellidos' => $user->apellidos,
            'celular' => $user->celular,
            'email' => $user->email,
        ]);
    }
}
