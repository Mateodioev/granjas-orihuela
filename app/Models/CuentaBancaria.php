<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    protected $fillable = [
        'empleado_id',
        'banco_id',
        'numero_cuenta',
        'is_cts',
        'moneda',
    ];

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
