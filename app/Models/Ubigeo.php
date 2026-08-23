<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubigeo_reniec',
        'ubigeo_inei',
        'departamento_inei',
        'departamento',
        'provincia_inei',
        'provincia',
        'distrito',
        'region',
        'superficie',
        'altitud',
        'latitud',
        'longitud',
    ];

    public $timestamps = false;
}
