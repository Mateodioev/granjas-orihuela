<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
