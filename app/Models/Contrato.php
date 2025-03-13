<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'empleado_id',
        'sede_id',
        'tipo_contrato_id',
        'fecha_inicio',
        'fecha_fin',
        'horas_trabajo',
        'status',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }


    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id');
    }
}
