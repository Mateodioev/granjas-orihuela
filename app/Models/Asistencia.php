<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'empleado_id',
        'fecha',
        'horas_trabajadas',
        'tardanza',
        'entrada',
        'salida',
        'estado',
        'fecha',
    ];
}
