<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seriepago extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'serie', 'contador'];
    public $timestamps = false;

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setSerieAttribute($value)
    {
        $this->attributes['serie'] =  trim(mb_strtoupper($value, "UTF-8"));
    }
}
