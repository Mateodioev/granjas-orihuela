<?php

declare(strict_types=1);

namespace App\Enums;

enum PermissionEnum: string
{
    // Permiso para crear un empleado
    case CrearEmpleado = 'create-employee';

    // Permiso para editar un empleado
    case EditarEmpleado = 'edit-employee';

    // Permiso para ver un empleado
    case VerEmpleado = 'ver-empleado';

    // Permiso para eliminar un empleado
    case EliminarEmpleado = 'eliminar-empleado';

    // Permiso para crear un contrato
    case CrearContrato = 'crear-contrato';

    // Permiso para editar un contrato
    case EditarContrato = 'editar-contrato';

    // Permiso para ver un contrato
    case VerContrato = 'ver-contrato';

    // Permiso para terminar un contrato
    case TerminarContrato = 'terminar-contrato';

    // Permiso para ver la asistencia
    case VerAsistencia = 'ver-asistencia';

    // Permiso para marcar la asistencia
    case MarcarAsistencia = 'marcar-asistencia';

    // Permiso para editar la asistencia
    case EditarAsistencia = 'editar-asistencia';

    // Permiso para aprobar un adelanto
    case AprobarAdelanto = 'aprobar-adelanto';

    // Permiso para ver la nómina
    case VerNomina = 'ver-nomina';

    // Permiso para crear la nomina
    case ProcesarNomina = 'procesar-nomina';

    // Permiso para marcar la nomina como pagada
    case ProcesarDeposito = 'procesar-deposito';

    // Permiso para pedir un adelanto
    case PedirAdelanto = 'pedir-adelanto';

    case VerOtrasSedes = 'ver-otras-sedes';
}
