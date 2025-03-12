<?php

declare(strict_types=1);

namespace App\Enums;

enum RolesEnum: string
{
    /**
     * Acceso total al sistema
     * Puede agregar mas configuraciones
     */
    case ADMIN = 'admin';

    /**
     * Gestiona empleados, contratos, asistencia y adelantos.
     * No puede configurar el sistema
     */
    case HR = 'hr';

    /**
     * Maneja la nomina, bancos y depósitos
     * No puede modificar datos de empleados ni contratos
     */
    case CONTADOR = 'contador';

    /**
     * Supervisa empleados en una sede especifica.
     * Puede registrar asistencia
     */
    case SUPERVISOR = 'supervisor';

    /**
     * Empleado
     * Puede solicitar adelantos y ver su asistencia
     */
    case EMPLEADO = 'empleado';

    case EXTERNO = 'externo';
}
