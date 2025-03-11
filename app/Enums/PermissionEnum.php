<?php

declare(strict_types=1);

namespace App\Enums;

enum PermissionEnum: string
{
    case CrearEmpleado = 'create-employee';
    case EditarEmpleado = 'edit-employee';
    case VerEmpleado = 'ver-empleado';
    case EliminarEmpleado = 'eliminar-empleado';
    case CrearContrato = 'crear-contrato';
    case EditarContrato = 'editar-contrato';
    case VerContrato = 'ver-contrato';
    case TerminarContrato = 'terminar-contrato';
    case VerAsistencia = 'ver-asistencia';
    case MarcarAsistencia = 'marcar-asistencia';
    case EditarAsistencia = 'editar-asistencia';
    case AprobarAdelanto = 'aprobar-adelanto';
    case VerNomina = 'ver-nomina';
    // crear la nomina
    case ProcesarNomina = 'procesar-nomina';
    // Marcar una nomina como pagada
    case ProcesarDeposito = 'procesar-deposito';
    case PedirAdelanto = 'pedir-adelanto';
}
