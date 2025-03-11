<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createPermissions();
        $this->createAdminRol();
        $this->createHRRol();
        $this->createContadorRol();
        $this->createSupervisorRol();
        $this->createEmpleadoRol();
    }

    private function createPermissions(): void
    {
        foreach (PermissionEnum::cases() as $permission) {
            Permission::create(['name' => $permission->value]);
        }
    }


    private function createAdminRol(): void
    {
        $rol = Role::create(['name' => RolesEnum::ADMIN]);
        $rol->givePermissionTo(PermissionEnum::cases());
    }

    private function createHRRol(): void
    {
        $rol = Role::create(['name' => RolesEnum::HR]);
        $rol->givePermissionTo([
            PermissionEnum::CrearEmpleado,
            PermissionEnum::EditarEmpleado,
            PermissionEnum::VerEmpleado,
            PermissionEnum::EliminarEmpleado,
            PermissionEnum::CrearContrato,
            PermissionEnum::EditarContrato,
            PermissionEnum::VerContrato,
            PermissionEnum::TerminarContrato,
            PermissionEnum::VerAsistencia,
            PermissionEnum::EditarAsistencia,
            PermissionEnum::AprobarAdelanto,
        ]);
    }

    private function createContadorRol(): void
    {
        $rol = Role::create(['name' => RolesEnum::CONTADOR]);
        $rol->givePermissionTo([
            PermissionEnum::AprobarAdelanto,
            PermissionEnum::VerNomina,
            PermissionEnum::ProcesarNomina,
            PermissionEnum::ProcesarDeposito,
        ]);
    }

    private function createSupervisorRol(): void
    {
        $rol = Role::create(['name' => RolesEnum::SUPERVISOR]);
        $rol->givePermissionTo([
            PermissionEnum::VerEmpleado,
            PermissionEnum::VerAsistencia,
            PermissionEnum::MarcarAsistencia,
        ]);
    }

    private function createEmpleadoRol(): void
    {
        $rol = Role::create(['name' => RolesEnum::EMPLEADO]);
        $rol->givePermissionTo([
            PermissionEnum::VerAsistencia,
            PermissionEnum::VerNomina,
            PermissionEnum::PedirAdelanto,
        ]);
    }
}
