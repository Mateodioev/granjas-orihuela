<?php

declare(strict_types=1);

namespace App\Enums;

enum AdelantoStatusEnum: string
{
    case PENDIENTE = 'Pendiente';
    case PAGADO = 'Pagado';
    case CANCELADO = 'Cancelado';
}
