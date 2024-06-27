<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'descripcion', 'price', 'type', 'mac', 'network_id'
    ];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

}
