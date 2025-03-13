<?php

declare(strict_types=1);

namespace App\Enums;

enum AsistenciaStatusEnum: string
{
    case PRESENTE = 'PRESENTE';
    case TARDE = 'TARDE';
    case FALTA = 'FALTA';
    case JUSTIFICADO = 'JUSTIFICADO';
}
