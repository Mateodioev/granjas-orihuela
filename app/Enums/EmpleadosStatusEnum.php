<?php

declare(strict_types=1);

namespace App\Enums;

enum EmpleadosStatusEnum: string
{
    case ACTIVO = 'activo';
    case INACTIVO = 'inactivo';
}
