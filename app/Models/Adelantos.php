<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adelantos extends Model
{
    protected $fillable = [
        'empleado_id',
        'remuneracion_id',
        'fecha',
        'monto',
        'estado',
        'detalles'
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'monto' => 'decimal:2',
        ];
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function remuneracion()
    {
        return $this->belongsTo(Remuneraciones::class, 'remuneracion_id');
    }

}
