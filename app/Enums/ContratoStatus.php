<?php

declare(strict_types=1);

namespace App\Enums;

enum ContratoStatus
{
    case VIGENTE = 'Vigente';
    case FINALIZADO = 'Finalizado';
    case RENOVADO = 'Renovado';
}
