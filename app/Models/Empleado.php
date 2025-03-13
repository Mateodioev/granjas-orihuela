<?php

namespace App\Models;

use App\Enums\EmpleadosStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'user_id',
        'puesto_id',
        'sede_id',
        'estado',
        'fecha_ingreso',
        'fecha_baja',
    ];

    protected function casts(): array
    {
        return [
            'estado' => EmpleadosStatusEnum::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function contrato()
    {
        return $this->hasOne(Contrato::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
