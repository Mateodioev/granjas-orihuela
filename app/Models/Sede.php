<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'sede_usuario')->withTimestamps();
    }
}
