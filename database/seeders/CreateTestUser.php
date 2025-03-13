<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Area;
use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Sede;
use App\Models\TipoContrato;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateTestUser extends Seeder
{
    public function run(): void
    {
        $area = Area::create(['nombre' => 'Sistemas']);
        $puesto = Puesto::create([
            'nombre' => 'Desarrollador',
            'area_id' => $area->id,
        ]);
        $sede = Sede::create([
            'nombre' => 'San Ramon',
            'direccion' => 'San Ramon',
        ]);


        $user = User::factory()->create();
        $user->assignRole(RolesEnum::ADMIN);

        $empleado = Empleado::create([
            'user_id' => $user->id,
            'puesto_id' => $puesto->id,
            'sede_id' => $sede->id,
            'estado' => 'activo',
            'fecha_ingreso' => now()
        ]);

        $tipoContrato = TipoContrato::create(['nombre' => 'Indefinido']);

        $contrato = Contrato::create([
            'empleado_id' => $empleado->id,
            'sede_id' => $sede->id,
            'puesto_id' => $puesto->id,
            'fecha_inicio' => now(),
            'jornal' => 40,
            'status' => 'Vigente',
            'tipo_contrato_id' => $tipoContrato->id,
        ]);

        $empleado->contrato_id = $contrato->id;
        $empleado->save();
    }
}
