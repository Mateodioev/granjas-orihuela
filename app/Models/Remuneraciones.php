<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remuneraciones extends Model
{
    protected $fillable = [
        'empleado_id',
        'contrato_id',
        'fecha_pago',
        'salario_bruto',
        'bonus',
        'deducciones',
        'salario_neto'
    ];

    protected function casts(): array
    {
        return [
            'fecha_pago' => 'date',
            'salario_bruto' => 'float',
            'bonus' => 'float',
            'deducciones' => 'float',
            'salario_neto' => 'float'
        ];
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
