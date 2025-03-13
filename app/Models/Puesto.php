<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'nombre',
        'area_id',
        'created_at'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
