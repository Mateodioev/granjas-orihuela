<?php

declare(strict_types=1);

namespace App\Enums;

enum TipoContratoEnum: string
{
    case INDEFINIDO = 'indefinido';
    case TEMPORAL = 'temporal';
    case PRACTICAS = 'prácticas';
    case POR_PROYECTO = 'proyecto';
}
